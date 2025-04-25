// resources/js/news-manager.js
export function newsManager() {
    return {
        showModal: false,
        showEditModal: false,
        editId: null,
        currentTab: "hot",
        formData: {
            judul: "",
            deskripsi: "",
            link: "",
            type: "hot",
            image: null,
        },

        async uploadNews() {
            try {
                const formData = new FormData();
                formData.append("judul", this.formData.judul);
                formData.append("deskripsi", this.formData.deskripsi);
                formData.append("link", this.formData.link);
                formData.append("type", this.formData.type);
                formData.append("image", this.formData.image);
                formData.append(
                    "_token",
                    document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content")
                );

                const response = await fetch("/admin/news/store", {
                    method: "POST",
                    body: formData,
                });

                // Add this error handling section
                if (!response.ok) {
                    // Check if response is HTML (likely an error page)
                    const contentType = response.headers.get("content-type");
                    if (contentType && contentType.includes("text/html")) {
                        const htmlText = await response.text();
                        console.error(
                            "Server returned HTML instead of JSON:",
                            htmlText
                        );
                        throw new Error(
                            "Server error occurred. Check console for details."
                        );
                    }
                }

                const result = await response.json();

                if (response.ok) {
                    notify(result.message);
                    this.showModal = false;
                    this.resetForm();
                    location.reload();
                } else {
                    throw new Error(result.message || "Failed to upload news");
                }
            } catch (error) {
                notify(error.message, "error");
                console.error("Full error:", error);
            }
        },

        async editNews(id) {
            this.editId = id;
            this.loading = true;

            // Add console logging to help debug
            console.log("Editing news with ID:", id);

            // Make sure the URL is correct - check if you need a prefix like '/admin' or if your app is in a subfolder
            const url = `/admin/news/get/${id}`;
            console.log("Fetch URL:", url);

            fetch(url, {
                method: "GET",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    Accept: "application/json",
                },
            })
                .then((response) => {
                    console.log("Response status:", response.status);
                    if (!response.ok) {
                        throw new Error(
                            `Failed to fetch news data: ${response.status}`
                        );
                    }
                    return response.json();
                })
                .then((data) => {
                    console.log("Received data:", data);
                    // Populate the form with the fetched data
                    this.formData = {
                        judul: data.judul,
                        deskripsi: data.deskripsi,
                        link: data.link,
                        type: data.type,
                        image: null, // Keep as null since we don't want to replace the image by default
                    };

                    // Show the edit modal
                    this.showEditModal = true;
                    this.loading = false;
                })
                .catch((error) => {
                    console.error("Error fetching news:", error);
                    notify("Error loading news data", "error");
                    this.loading = false;
                });
        },

        updateNews() {
            const form = new FormData();
            form.append("judul", this.formData.judul);
            form.append("deskripsi", this.formData.deskripsi);
            form.append("link", this.formData.link);
            form.append("type", this.formData.type);
            if (this.formData.image) {
                form.append("image", this.formData.image);
            }
            form.append(
                "_token",
                document.querySelector('input[name="_token"]').value
            );
            form.append("_method", "POST"); // Laravel method spoofing

            fetch(`/admin/news/update/${this.editId}`, {
                method: "POST",
                body: form,
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                },
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then((data) => {
                    notify(data.message);
                    this.resetForm();
                    this.showEditModal = false;
                    window.location.reload(); // Reload to show the updated data
                })
                .catch((error) => {
                    console.error("Error:", error);
                    notify("Error updating news", "error");
                });
        },

        deleteNews(id) {
            if (confirm("Are you sure you want to delete this news?")) {
                const form = new FormData();
                form.append(
                    "_token",
                    document.querySelector('input[name="_token"]').value
                );

                fetch(`/admin/news/destroy/${id}`, {
                    method: "POST",
                    body: form,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        Accept: "application/json", // This is critical - explicitly ask for JSON
                    },
                })
                    .then((response) => {
                        // Check if response is ok before trying to parse JSON
                        if (!response.ok) {
                            return response.text().then((text) => {
                                throw new Error(
                                    `Server responded with status ${response.status}: ${text}`
                                );
                            });
                        }
                        return response.json();
                    })
                    .then((data) => {
                        notify(data.message);
                        window.location.reload(); // Reload to update the table
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        notify(
                            "Error deleting news: " + error.message,
                            "error"
                        );
                    });
            }
        },

        async moveToOld(id) {
            if (!confirm("Are you sure you want to move this to old news?")) {
                return;
            }

            try {
                const formData = new FormData();
                formData.append(
                    "_token",
                    document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content")
                );

                const response = await fetch(`/admin/news/move-to-old/${id}`, {
                    method: "POST",
                    body: formData,
                });

                const result = await response.json();

                if (response.ok) {
                    notify(result.message);
                    location.reload(); // Refresh to update the UI
                } else {
                    throw new Error(result.message || "Failed to move news");
                }
            } catch (error) {
                notify(error.message, "error");
            }
        },

        handleFileChange(event) {
            this.formData.image = event.target.files[0];
        },

        handleFileChange(event) {
            this.formData.image = event.target.files[0];
        },

        handleModalClick(event) {
            // Only close the modal if clicking directly on the overlay background
            // and not on the modal content or its children
            if (event.target === event.currentTarget) {
                this.showModal = false;
            }
        },

        handleEditModalClick(event) {
            // Only close the edit modal if clicking directly on the overlay background
            // and not on the modal content or its children
            if (event.target === event.currentTarget) {
                this.showEditModal = false;
            }
        },

        resetForm() {
            this.formData = {
                judul: "",
                deskripsi: "",
                link: "",
                type: this.currentTab,
                image: null,
            };
            // Reset file input
            document.getElementById("image").value = "";
            if (document.getElementById("edit_image")) {
                document.getElementById("edit_image").value = "";
            }
        },
    };
}
