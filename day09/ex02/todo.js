function getCookie(name = null)
{
    var data = null;

    try     { data = JSON.parse(decodeURIComponent(document.cookie)); }
    catch   { data = null; }

    if (!name)
        return (data);
    if (data)
        return (data[name]);

    return (null);
}

function setCookie(key, val)
{
    //if the cookie is null, it's an emmpty object {}.
    var d = getCookie(null) || {};

    d[key] = val;

    //transform JSON object {key: value} to string
    var str = JSON.stringify(d);
    //Save it on cookie
    document.cookie = encodeURIComponent(str);
    //Returns the information inside the cookie
    return (d);
}

window.onload = () => {

    var newButton = document.getElementById('new-button');
    var list      = document.getElementById('ft_list');

    function removeTask(task) {
        if (window.confirm('Remove task?'))
        {
            var cookieArr = getCookie('tasks') || [];
            var i   = cookieArr.indexOf(task.getAttribute('data-content'));

            if (i != -1) {
                //Remove from the array splice(position, how many)
                cookieArr.splice(i, 1);
                //Updates the cookie
                setCookie('tasks', cookieArr);
            }
            //Remove from the dropdown list
            task.remove();
        }
    }

    function addTask(task) {
        var node = document.createElement('div');
        node.classList.add('task');

        node.innerText = task;
        node.setAttribute('data-content', task);
        //Sets the function removeTask on click
        node.addEventListener('click', () => removeTask(node));
        //Inserts it as first element
        list.prepend(node);
    }

    function buildUI() {
        //Get the array inside the cookie, or it's a new array empty.
        var cookieArr = getCookie('tasks') || [];
        //Loads the information in the previous array
        cookieArr.forEach((task) => addTask(task));
    }

    newButton.addEventListener('click', (_) => {
        var task = window.prompt('New task');

        // If the text field is not empty
        if (task && task.trim() != '') {
            var cookieArr = getCookie('tasks') || [];

            if (cookieArr.indexOf(task) != -1)
                return window.alert('Task exists.');

            cookieArr.push(task);
            setCookie('tasks', cookieArr);

            addTask(task);
        }
    });

    //Execute on load
    buildUI();
};