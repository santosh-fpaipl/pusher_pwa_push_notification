import './bootstrap';
if (typeof window.Livewire !== 'undefined') {
    window.Echo.channel('Test-channel').listen('.Test-event', (e) => {
        // Handle the event data here
        //console.log(e.message);
        //const messageContainer = document.getElementById('messageContainer');
        //messageContainer.innerHTML += `<p>${e.message}</p>`;
        //location.reload();
        window.Livewire.dispatch('refreshComponent');
    });
} else {
    console.error("Livewire is not defined.");
}