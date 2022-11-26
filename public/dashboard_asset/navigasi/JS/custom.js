function updateOnlineStatus() {
    document.getElementById("status").innerHTML = "Online";
    document.getElementById("icon").classList.remove('text-warning');
    document.getElementById("icon").classList.add('text-success');
}

function updateOfflineStatus() {
    document.getElementById("status").innerHTML = "Offline";
    document.getElementById("icon").classList.remove('text-success');
    document.getElementById("icon").classList.add('text-warning');
}

window.addEventListener('online', updateOnlineStatus);
window.addEventListener('offline', updateOfflineStatus); 