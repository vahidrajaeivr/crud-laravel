Livewire.on("deleteTriggered", (id, name) => {
    const proceed = confirm(`Are you sure you want to delete ${name}`);

    if (proceed) {
        Livewire.emit("delete", id);
    }
});

Livewire.on("triggerCreate", () => {
    $("#user-modal").modal("show");
});

window.addEventListener("user-saved", (event) => {
    $("#user-modal").modal("hide");
});

Livewire.on("dataFetched", (user) => {
    $("#user-modal").modal("show");
});
