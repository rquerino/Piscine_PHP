function getCookie(name = null)
{
    let data = null;

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
    let d = getCookie(null) || {};

    d[key] = val;

    let str = JSON.stringify(d);
    document.cookie = encodeURIComponent(str);
    return (d);
}

window.onload = () => {

    let newButton = document.getElementById('new-button');
    let list      = document.getElementById('ft_list');

    function removeTask(task) {
        if (window.confirm('Remove task?'))
        {
            let arr = getCookie('tasks') || [];
            let i   = arr.indexOf(task.getAttribute('data-content'));

            if (i != -1) {
                arr.splice(i, 1);
                setCookie('tasks', arr);
            }

            task.remove();
        }
    }

    function addTask(task, append = false) {
        let node = document.createElement('div');
        node.classList.add('task');

        node.innerText = task;
        node.setAttribute('data-content', task);
        node.addEventListener('click', () => removeTask(node));

        if (append)
            list.append(node);
        else
            list.prepend(node);
    }

    function buildUI() {
        let arr = getCookie('tasks') || [];

        arr.forEach((task) => addTask(task));
    }

    newButton.addEventListener('click', (_) => {
        let task = window.prompt('New task');

        if (task && task.trim() != '') {
            let arr = getCookie('tasks') || [];

            if (arr.indexOf(task) != -1)
                return window.alert('Task exists.');

            arr.push(task);
            setCookie('tasks', arr);

            addTask(task);
        }
    });

    buildUI();
};
