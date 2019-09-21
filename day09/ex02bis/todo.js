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
    var d = getCookie(null) || {};

    d[key] = val;
    var str = JSON.stringify(d);
    document.cookie = encodeURIComponent(str);
    return (d);
}

$(window).on('load', function () {

    var $newButton = $('#new-button');
    var $list      = $('#ft_list');

    function removeTask(task) {
        if (window.confirm('Remove task?'))
        {
            var cookieArr = getCookie('tasks') || [];
            var i   = cookieArr.indexOf(task.getAttribute('data-content'));

            if (i != -1) {
                cookieArr.splice(i, 1);
                setCookie('tasks', cookieArr);
            }
            task.remove();
        }
    }

    function addTask(task) {
        var node = document.createElement('div');
        node.classList.add('task');

        node.innerText = task;
        node.setAttribute('data-content', task);
        node.addEventListener('click', () => removeTask(node));
        $list.prepend(node);
    }

    function buildUI() {
        var cookieArr = getCookie('tasks') || [];
        cookieArr.forEach((task) => addTask(task));
    }

    $newButton.on('click', function () {
        var task = window.prompt('New task');

        if (task && task.trim() != '') {
            var cookieArr = getCookie('tasks') || [];

            if (cookieArr.indexOf(task) != -1)
                return window.alert('Task exists.');

            cookieArr.push(task);
            setCookie('tasks', cookieArr);

            addTask(task);
        }
    });

    buildUI();
});