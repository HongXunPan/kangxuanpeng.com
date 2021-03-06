<script> var postDirectoryBuild = function () {
        var postChildren = function children(childNodes, reg) {
            var result = [], isReg = typeof reg === 'object', isStr = typeof reg === 'string', node, i, len;
            for (i = 0, len = childNodes.length; i < len; i++) {
                node = childNodes[i];
                if ((node.nodeType === 1 || node.nodeType === 9) && (!reg || isReg && reg.test(node.tagName.toLowerCase()) || isStr && node.tagName.toLowerCase() === reg)) {
                    result.push(node);
                }
            }
            return result;
        }, createPostDirectory = function (article, directory, isDirNum) {
            var contentArr = [], titleId = [], levelArr, root, level, currentList, list, li, link, i, len;
            levelArr = (function (article, contentArr, titleId) {
                var titleElem = postChildren(article.childNodes, /^h\d$/), levelArr = [], lastNum = 1, lastRevNum = 1,
                    count = 0, guid = 1, id = 'directory' + (Math.random() + '').replace(/\D/, ''), lastRevNum, num,
                    elem;
                while (titleElem.length) {
                    elem = titleElem.shift();
                    contentArr.push(elem.innerHTML);
                    num = +elem.tagName.match(/\d/)[0];
                    if (num > lastNum) {
                        levelArr.push(1);
                        lastRevNum += 1;
                    } else if (num === lastRevNum || num > lastRevNum && num <= lastNum) {
                        levelArr.push(0);
                        lastRevNum = lastRevNum;
                    } else if (num < lastRevNum) {
                        levelArr.push(num - lastRevNum);
                        lastRevNum = num;
                    }
                    count += levelArr[levelArr.length - 1];
                    lastNum = num;
                    elem.id = elem.id || (id + guid++);
                    titleId.push(elem.id);
                }
                if (count !== 0 && levelArr[0] === 1) levelArr[0] = 0;
                return levelArr;
            })(article, contentArr, titleId);
            currentList = root = document.createElement('ul');
            dirNum = [0];
            for (i = 0, len = levelArr.length; i < len; i++) {
                level = levelArr[i];
                if (level === 1) {
                    list = document.createElement('ul');
                    if (!currentList.lastElementChild) {
                        currentList.appendChild(document.createElement('li'));
                    }
                    currentList.lastElementChild.appendChild(list);
                    currentList = list;
                    dirNum.push(0);
                } else if (level < 0) {
                    level *= 2;
                    while (level++) {
                        if (level % 2) dirNum.pop();
                        currentList = currentList.parentNode;
                    }
                }
                dirNum[dirNum.length - 1]++;
                li = document.createElement('li');
                link = document.createElement('a');
                link.href = '#' + titleId[i];
                link.innerHTML = !isDirNum ? contentArr[i] : dirNum.join('.') + ' ' + contentArr[i];
                li.appendChild(link);
                currentList.appendChild(li);
            }
            directory.appendChild(root);
        };
        createPostDirectory(document.getElementById('post-content'), document.getElementById('directory'), true);
    };
    postDirectoryBuild();
</script>

<script> var postDirectory = new Headroom(document.getElementById("directory-content"), {
        tolerance: 0,
        offset: 90,
        classes: {initial: "initial", pinned: "pinned", unpinned: "unpinned"}
    });
    postDirectory.init();
    var postSharer = new Headroom(document.getElementById("post-bottom-bar"), {
        tolerance: 0,
        offset: 70,
        classes: {initial: "animated", pinned: "pinned", unpinned: "unpinned"}
    });
    postSharer.init();

    if ('addEventListener' in document) {
        document.addEventListener('DOMContentLoaded', function () {
            FastClick.attach(document.body);
        }, false);
    }
</script>
<script src="{{ asset('js/blog/jquery.min.js') }}"></script>
<script>
    $(".bottom-bar-qrcode").hover(function () {
        $("#qrcode").show();
    }, function () {
        $("#qrcode").hide();
    });
    document.getElementById("author").setAttribute('value', localStorage.getItem('nick_name') == null ? '' : localStorage.getItem('nick_name'));
    document.getElementById("mail").setAttribute('value', localStorage.getItem('email') == null ? '' : localStorage.getItem('email'));
    document.getElementById("url").setAttribute('value', localStorage.getItem('site') == null ? '' : localStorage.getItem('site'));

    function confirmForm() {
        document.getElementById('misubmit').disabled=true;
        var post_id = {{$post->post_id}};
        var nick_name = document.getElementById('author').value;
        var email = document.getElementById('mail').value;
        var site = document.getElementById('url').value;
        localStorage.setItem("nick_name", nick_name);
        localStorage.setItem("email", email);
        localStorage.setItem("site", site);
        gtag('event', 'comment', {'post_id':post_id ,'nick_name':nick_name, 'email':email, 'site':site});
        return true;
    }
</script>