// custom javascript if required.

var idleTime = 0;
$(document).ready(function () {
        var time;
        window.onload = resetTimer;
        // DOM Events
        document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;
    
        function logout() {
            alert("You are now logged out due to inactivity!!")
            location.href = 'logout.php' + window.location.search;
        }
    
        function resetTimer() {
            clearTimeout(time);
            //time = setTimeout(logout, 600000) // uncomment this line to activate auto logout
            // 1000 milliseconds = 1 second
        }
    
});
