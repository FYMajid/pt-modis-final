// File: resources/js/career-manager.js
export function careerManager() {
    return {
        showModal: false,
        showEditModal: false,
        currentCareer: null,
        formData: {
            id: null,
            position: "",
            description: "",
            link: "",
        },

        // Reset form data
        resetForm() {
            this.formData = {
                id: null,
                position: "",
                description: "",
                link: "",
            };
        },

        // Upload new career opportunity
        async uploadCareer() {
            try {
                const response = await fetch("/admin/careers", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify(this.formData),
                });

                // Check if response is JSON before parsing
                const contentType = response.headers.get("content-type");
                if (contentType && contentType.includes("application/json")) {
                    const data = await response.json();

                    if (response.ok) {
                        notify(data.message);
                        window.location.reload();
                    } else {
                        notify(data.message || "An error occurred", "error");
                    }
                } else {
                    // Handle non-JSON response
                    const text = await response.text();
                    console.error("Server returned non-JSON response:", text);
                    notify(
                        "Server returned an invalid response format",
                        "error"
                    );
                }
            } catch (error) {
                console.error("Error:", error);
                notify("An unexpected error occurred", "error");
            }

            this.showModal = false;
            this.resetForm();
        },

        // Edit career opportunity
        // Edit career opportunity
        async editCareer(id) {
            try {
                const response = await fetch(`/admin/careers/${id}`, {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                });

                const contentType = response.headers.get("content-type");
                if (contentType && contentType.includes("application/json")) {
                    const data = await response.json();

                    if (response.ok) {
                        // Menyalin data karir ke formData
                        this.formData = {
                            id: data.career.id,
                            position: data.career.position,
                            description: data.career.description, // menambahkan deskripsi
                            link: data.career.link,
                        };
                        this.showEditModal = true;

                        // Menggunakan $nextTick untuk memastikan Trix editor sudah ter-render
                        this.$nextTick(() => {
                            // Memasukkan konten deskripsi ke dalam Trix editor
                            this.$refs.trixInput.value =
                                this.formData.description;
                            this.$refs.trixEditor.editor.loadHTML(
                                this.formData.description
                            ); // Set konten ke Trix editor
                        });
                    } else {
                        notify(
                            data.message || "Failed to load career information",
                            "error"
                        );
                    }
                } else {
                    const text = await response.text();
                    console.error("Server returned non-JSON response:", text);
                    notify(
                        "Server returned an invalid response format",
                        "error"
                    );
                }
            } catch (error) {
                console.error("Error:", error);
                notify("An unexpected error occurred", "error");
            }
        },

        // Update career opportunity
        async updateCareer() {
            this.formData.description = this.$refs.trixInput.value;

            try {
                const response = await fetch(
                    `/admin/careers/${this.formData.id}`,
                    {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                        },
                        body: JSON.stringify(this.formData),
                    }
                );

                const contentType = response.headers.get("content-type");
                if (contentType && contentType.includes("application/json")) {
                    const data = await response.json();

                    if (response.ok) {
                        notify(data.message);
                        window.location.reload();
                    } else {
                        notify(data.message || "An error occurred", "error");
                    }
                } else {
                    const text = await response.text();
                    console.error("Server returned non-JSON response:", text);
                    notify(
                        "Server returned an invalid response format",
                        "error"
                    );
                }
            } catch (error) {
                console.error("Error:", error);
                notify("An unexpected error occurred", "error");
            }

            this.showEditModal = false;
            this.resetForm();
        },

        // Delete career opportunity
        async deleteCareer(id) {
            if (
                !confirm(
                    "Are you sure you want to delete this career opportunity?"
                )
            ) {
                return;
            }

            try {
                const response = await fetch(`/admin/careers/${id}`, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                });

                // Check if response is JSON
                const contentType = response.headers.get("content-type");
                if (contentType && contentType.includes("application/json")) {
                    const data = await response.json();

                    if (response.ok) {
                        notify(data.message);
                        window.location.reload();
                    } else {
                        notify(data.message || "An error occurred", "error");
                    }
                } else {
                    // Handle non-JSON response
                    const text = await response.text();
                    console.error("Server returned non-JSON response:", text);
                    notify(
                        "Server returned an invalid response format",
                        "error"
                    );
                }
            } catch (error) {
                console.error("Error:", error);
                notify("An unexpected error occurred", "error");
            }
        },
    };
}
