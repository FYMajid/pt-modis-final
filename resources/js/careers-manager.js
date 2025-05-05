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

        // Improved init method for proper Trix handling
        init() {
            this.$nextTick(() => {
                // Set up Trix editor event listener
                if (this.$refs.trixEditor) {
                    // Remove any existing listeners to prevent duplicates
                    this.$refs.trixEditor.removeEventListener(
                        "trix-change",
                        this.handleTrixChange
                    );

                    // Add the event listener with a named function for easy removal
                    this.$refs.trixEditor.addEventListener(
                        "trix-change",
                        (this.handleTrixChange = (event) => {
                            if (this.$refs.trixInput) {
                                this.formData.description =
                                    this.$refs.trixInput.value;
                            }
                        })
                    );

                    // Initialize the form data description with any existing trix content
                    if (this.$refs.trixInput) {
                        this.formData.description = this.$refs.trixInput.value;
                    }
                }
            });
        },

        // Reset form data with improved Trix reset
        resetForm() {
            this.formData = {
                id: null,
                position: "",
                description: "",
                link: "",
            };

            // Reset the Trix editor properly
            this.$nextTick(() => {
                if (this.$refs.trixEditor && this.$refs.trixEditor.editor) {
                    this.$refs.trixEditor.editor.loadHTML("");
                }
                if (this.$refs.trixInput) {
                    this.$refs.trixInput.value = "";
                }
            });
        },

        // Upload new career opportunity with improved description handling
        async uploadCareer() {
            // Ensure we have the latest content from Trix editor before submission
            if (this.$refs.trixInput) {
                this.formData.description = this.$refs.trixInput.value;
            }

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

                const contentType = response.headers.get("content-type");

                if (contentType && contentType.includes("application/json")) {
                    const data = await response.json();

                    if (response.ok) {
                        notify(
                            data.message ||
                                "Career opportunity added successfully"
                        );
                        window.location.reload();
                    } else {
                        // Handle validation errors
                        if (response.status === 422 && data.errors) {
                            let errorMessage = "Validation failed: ";
                            for (const field in data.errors) {
                                errorMessage += `${field}: ${data.errors[
                                    field
                                ].join(", ")}. `;
                            }
                            notify(errorMessage, "error");
                        } else {
                            notify(
                                data.message || "An error occurred",
                                "error"
                            );
                        }
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

        // Edit career opportunity with improved description handling
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
                        // Copy career data to formData
                        this.formData = {
                            id: data.career.id,
                            position: data.career.position,
                            description: data.career.description,
                            link: data.career.link,
                        };
                        this.showEditModal = true;

                        // Use $nextTick to ensure Trix editor is rendered
                        this.$nextTick(() => {
                            if (
                                this.$refs.trixInput &&
                                this.$refs.trixEditor &&
                                this.$refs.trixEditor.editor
                            ) {
                                // Set the hidden input value
                                this.$refs.trixInput.value =
                                    this.formData.description;

                                // Set the Trix editor content with proper HTML parsing
                                this.$refs.trixEditor.editor.loadHTML(
                                    this.formData.description
                                );
                            }
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

        // Update career opportunity with improved description handling
        async updateCareer() {
            // Make sure we have the latest content from the Trix editor
            if (this.$refs.trixInput) {
                this.formData.description = this.$refs.trixInput.value;
            }

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
                        notify(
                            data.message ||
                                "Career opportunity updated successfully"
                        );
                        window.location.reload();
                    } else {
                        // Handle validation errors
                        if (response.status === 422 && data.errors) {
                            let errorMessage = "Validation failed: ";
                            for (const field in data.errors) {
                                errorMessage += `${field}: ${data.errors[
                                    field
                                ].join(", ")}. `;
                            }
                            notify(errorMessage, "error");
                        } else {
                            notify(
                                data.message || "An error occurred",
                                "error"
                            );
                        }
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

        // Delete career opportunity function
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
                        notify(
                            data.message ||
                                "Career opportunity deleted successfully"
                        );
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

        // Handle file change for potential future use
        handleFileChange(event) {
            // This is a placeholder in case you need to handle file uploads later
        },
    };
}
