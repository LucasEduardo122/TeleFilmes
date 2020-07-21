

<?php extract($this->Dados['video'][0]) ?>
<?php
extract($this->Dados['comentario'][0]);
?>

<script>

    /**
     * 
     * flatNotify.js v0.1
     * @screenshake
     *
     * Inspired by :
     * http://tympanus.net/codrops/2014/07/23/notification-styles-inspiration/
     * 
     * Animation courtesy :
     * bounce.js - http://bouncejs.com/
     * 
     * Class manipulation
     * classie.js https://github.com/desandro/classie
     * 
     */
    ;
    (function (window) {

        var proto_methods = {
            options: {
                wrapper: document.body,
                dismissIn: 5000
            },
            init: function () {
                this.ntf = document.createElement('div');
                this.ntf.className = 'f-notification';
                var strinner = '<div class="f-notification-inner"></div><div class="f-close">x</div></div>';
                this.ntf.innerHTML = strinner;

                // append to body or the element specified in options.wrapper
                this.options.wrapper.insertBefore(this.ntf, this.options.wrapper.lastChild);

                // init events
                this.initEvents();
            },
            initEvents: function () {
                var self = this;
                // dismiss notification
                this.ntf.querySelector('.f-close').addEventListener('click', function () {
                    self.dismiss();
                });
            },
            dismiss: function () {
                var self = this;
                clearTimeout(this.dismissttl);

                classie.remove(self.ntf, 'f-show');
                setTimeout(function () {
                    classie.add(self.ntf, 'f-hide');
                }, 25);

                setTimeout(function () {
                    self.options.wrapper.removeChild(self.ntf);
                }, 500);

            },
            setType: function (newType) {
                var self = this;

                classie.remove(self.ntf, 'f-notification-error');
                classie.remove(self.ntf, 'f-notification-alert');
                classie.remove(self.ntf, 'f-notification-success');

                classie.add(self.ntf, newType);

            },
            success: function (message, dismissIn) {
                var self = this;

                /**
                 * Use supplied dismiss timeout if present, else uses default value.
                 * If set to 0, doesnt automatically dismiss.
                 */
                dismissIn = (typeof dismissIn === "undefined") ? this.options['dismissIn'] : dismissIn;

                /**
                 * Set notification type styling
                 */
                self.setType('f-notification-success');

                self.ntf.querySelector('.f-notification-inner').innerHTML = message;

                classie.remove(self.ntf, 'f-hide');
                classie.add(self.ntf, 'f-show');

                if (dismissIn > 0) {
                    this.dismissttl = setTimeout(function () {
                        self.dismiss();
                    }, dismissIn);
                }
            },
            error: function (message, dismissIn) {
                var self = this;

                /**
                 * Use supplied dismiss timeout if present, else uses default value.
                 * If set to 0, doesnt automatically dismiss.
                 */
                dismissIn = (typeof dismissIn === "undefined") ? this.options['dismissIn'] : dismissIn;

                /**
                 * Set notification type styling
                 */
                self.setType('f-notification-error');

                self.ntf.querySelector('.f-notification-inner').innerHTML = message;

                classie.remove(self.ntf, 'f-hide');
                classie.add(self.ntf, 'f-show');

                if (dismissIn > 0) {
                    this.dismissttl = setTimeout(function () {
                        self.dismiss();
                    }, dismissIn);
                }
            },
            alert: function (message, dismissIn) {
                var self = this;

                /**
                 * Use supplied dismiss timeout if present, else uses default value.
                 * If set to 0, doesnt automatically dismiss.
                 */
                dismissIn = (typeof dismissIn === "undefined") ? this.options['dismissIn'] : dismissIn;

                /**
                 * Set notification type styling
                 */
                self.setType('f-notification-alert');

                self.ntf.querySelector('.f-notification-inner').innerHTML = message;

                classie.remove(self.ntf, 'f-hide');
                classie.add(self.ntf, 'f-show');

                if (dismissIn > 0) {
                    this.dismissttl = setTimeout(function () {
                        self.dismiss();
                    }, dismissIn);
                }
            }
        }, flatNotify, _flatNotifiy;

        _flatNotifiy = function () {
            this.init();
        };

        _flatNotifiy.prototype = proto_methods;

        flatNotify = function () {
            return new _flatNotifiy();
        };

        /**
         * add to global namespace
         */
        window.flatNotify = flatNotify;

    })(window);

    /*==========*/
    (function (window) {

        'use strict';

        // class helper functions from bonzo https://github.com/ded/bonzo

        function classReg(className) {
            return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
        }

        // classList support for class management
        // altho to be fair, the api sucks because it won't accept multiple classes at once
        var hasClass, addClass, removeClass;

        if ('classList' in document.documentElement) {
            hasClass = function (elem, c) {
                return elem.classList.contains(c);
            };
            addClass = function (elem, c) {
                elem.classList.add(c);
            };
            removeClass = function (elem, c) {
                elem.classList.remove(c);
            };
        } else {
            hasClass = function (elem, c) {
                return classReg(c).test(elem.className);
            };
            addClass = function (elem, c) {
                if (!hasClass(elem, c)) {
                    elem.className = elem.className + ' ' + c;
                }
            };
            removeClass = function (elem, c) {
                elem.className = elem.className.replace(classReg(c), ' ');
            };
        }

        function toggleClass(elem, c) {
            var fn = hasClass(elem, c) ? removeClass : addClass;
            fn(elem, c);
        }

        var classie = {
            // full names
            hasClass: hasClass,
            addClass: addClass,
            removeClass: removeClass,
            toggleClass: toggleClass,
            // short names
            has: hasClass,
            add: addClass,
            remove: removeClass,
            toggle: toggleClass
        };

        // transport
        if (typeof define === 'function' && define.amd) {
            // AMD
            define(classie);
        } else {
            // browser global
            window.classie = classie;
        }

    })(window);
</script>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<div class="ckin__player minimal ckin__overlay">
    <video poster="ckin.jpg" data-ckin="minimal" data-overlay="1">
        <source
            src="<?php echo $link1 ?>"

            type="video/mp4"><br>
        <font style="vertical-align: inherit;">
        <font style="vertical-align: inherit;">
        Seu navegador não suporta a tag de vídeo.</font>
        </font><br>
    </video>
    <button class="minimal__button--big toggle" title="Toggle Play">
        <i class="ckin-play"></i></button>
    <div class="minimal__controls ckin__controls">
        <button class="minimal__button toggle" title="Toggle Video">
            <i class="ckin-play"></i></button><div class="progress">
            <div class="progress__filled"></div></div>
        <button class="minimal__button volume" title="Volume">
            <i class="ckin-volume-medium"></i></button>
        <button class="minimal__button fullscreen" title="Full Screen">
            <i class="ckin-expand"></i></button>
    </div>
</div>

<script>

    (function () {
        // helpers
        var regExp = function regExp(name) {
            return new RegExp('(^| )' + name + '( |$)');
        };
        var forEach = function forEach(list, fn, scope) {
            for (var i = 0; i < list.length; i++) {
                fn.call(scope, list[i]);
            }
        };

        // class list object with basic methods
        function ClassList(element) {
            this.element = element;
        }

        ClassList.prototype = {
            add: function add() {
                forEach(arguments, function (name) {
                    if (!this.contains(name)) {
                        this.element.className += ' ' + name;
                    }
                }, this);
            },
            remove: function remove() {
                forEach(arguments, function (name) {
                    this.element.className = this.element.className.replace(regExp(name), '');
                }, this);
            },
            toggle: function toggle(name) {
                return this.contains(name) ? (this.remove(name), false) : (this.add(name), true);
            },
            contains: function contains(name) {
                return regExp(name).test(this.element.className);
            },
            // bonus..
            replace: function replace(oldName, newName) {
                this.remove(oldName), this.add(newName);
            }
        };

        // IE8/9, Safari
        if (!('classList' in Element.prototype)) {
            Object.defineProperty(Element.prototype, 'classList', {
                get: function get() {
                    return new ClassList(this);
                }
            });
        }

        // replace() support for others
        if (window.DOMTokenList && DOMTokenList.prototype.replace == null) {
            DOMTokenList.prototype.replace = ClassList.prototype.replace;
        }
    })();
    (function () {
        if (typeof NodeList.prototype.forEach === "function")
            return false;
        NodeList.prototype.forEach = Array.prototype.forEach;
    })();

// Unfortunately, due to scattered support, browser sniffing is required
    function browserSniff() {
        var nVer = navigator.appVersion,
                nAgt = navigator.userAgent,
                browserName = navigator.appName,
                fullVersion = '' + parseFloat(navigator.appVersion),
                majorVersion = parseInt(navigator.appVersion, 10),
                nameOffset,
                verOffset,
                ix;

        // MSIE 11
        if (navigator.appVersion.indexOf("Windows NT") !== -1 && navigator.appVersion.indexOf("rv:11") !== -1) {
            browserName = "IE";
            fullVersion = "11;";
        }
        // MSIE
        else if ((verOffset = nAgt.indexOf("MSIE")) !== -1) {
            browserName = "IE";
            fullVersion = nAgt.substring(verOffset + 5);
        }
        // Chrome
        else if ((verOffset = nAgt.indexOf("Chrome")) !== -1) {
            browserName = "Chrome";
            fullVersion = nAgt.substring(verOffset + 7);
        }
        // Safari
        else if ((verOffset = nAgt.indexOf("Safari")) !== -1) {
            browserName = "Safari";
            fullVersion = nAgt.substring(verOffset + 7);
            if ((verOffset = nAgt.indexOf("Version")) !== -1) {
                fullVersion = nAgt.substring(verOffset + 8);
            }
        }
        // Firefox
        else if ((verOffset = nAgt.indexOf("Firefox")) !== -1) {
            browserName = "Firefox";
            fullVersion = nAgt.substring(verOffset + 8);
        }
        // In most other browsers, "name/version" is at the end of userAgent
        else if ((nameOffset = nAgt.lastIndexOf(' ') + 1) < (verOffset = nAgt.lastIndexOf('/'))) {
            browserName = nAgt.substring(nameOffset, verOffset);
            fullVersion = nAgt.substring(verOffset + 1);
            if (browserName.toLowerCase() == browserName.toUpperCase()) {
                browserName = navigator.appName;
            }
        }
        // Trim the fullVersion string at semicolon/space if present
        if ((ix = fullVersion.indexOf(";")) !== -1) {
            fullVersion = fullVersion.substring(0, ix);
        }
        if ((ix = fullVersion.indexOf(" ")) !== -1) {
            fullVersion = fullVersion.substring(0, ix);
        }
        // Get major version
        majorVersion = parseInt('' + fullVersion, 10);
        if (isNaN(majorVersion)) {
            fullVersion = '' + parseFloat(navigator.appVersion);
            majorVersion = parseInt(navigator.appVersion, 10);
        }
        // Return data
        return [browserName, majorVersion];
    }

    var obj = {};
    obj.browserInfo = browserSniff();
    obj.browserName = obj.browserInfo[0];
    obj.browserVersion = obj.browserInfo[1];

    wrapPlayers();
    /* Get Our Elements */
    var players = document.querySelectorAll('.ckin__player');

    var iconPlay = '<i class="ckin-play"></i>';
    var iconPause = '<i class="ckin-pause"></i>';
    var iconVolumeMute = '<i class="ckin-volume-mute"></i>';
    var iconVolumeMedium = '<i class="ckin-volume-medium"></i>';
    var iconVolumeLow = '<i class="ckin-volume-low"></i>';
    var iconExpand = '<i class="ckin-expand"></i>';
    var iconCompress = '<i class="ckin-compress"></i>';

    players.forEach(function (player) {
        var video = player.querySelector('video');

        var skin = attachSkin(video.dataset.ckin);
        player.classList.add(skin);

        var overlay = video.dataset.overlay;
        addOverlay(player, overlay);

        var title = showTitle(skin, video.dataset.title);
        if (title) {
            player.insertAdjacentHTML('beforeend', title);
        }

        var html = buildControls(skin);
        player.insertAdjacentHTML('beforeend', html);

        var color = video.dataset.color;
        addColor(player, color);

        var playerControls = player.querySelector('.' + skin + '__controls');
        var progress = player.querySelector('.progress');
        var progressBar = player.querySelector('.progress__filled');
        var toggle = player.querySelectorAll('.toggle');
        var skipButtons = player.querySelectorAll('[data-skip]');
        var ranges = player.querySelectorAll('.' + skin + '__slider');
        var volumeButton = player.querySelector('.volume');
        var fullScreenButton = player.querySelector('.fullscreen');

        if (obj.browserName === "IE" && (obj.browserVersion === 8 || obj.browserVersion === 9)) {
            showControls(video);
            playerControls.style.display = "none";
        }

        video.addEventListener('click', function () {
            togglePlay(this, player);
        });
        video.addEventListener('play', function () {
            updateButton(this, toggle);
        });

        video.addEventListener('pause', function () {
            updateButton(this, toggle);
        });
        video.addEventListener('timeupdate', function () {
            handleProgress(this, progressBar);
        });

        toggle.forEach(function (button) {
            return button.addEventListener('click', function () {
                togglePlay(video, player);
            });
        });
        volumeButton.addEventListener('click', function () {
            toggleVolume(video, volumeButton);
        });

        var mousedown = false;
        progress.addEventListener('click', function (e) {
            scrub(e, video, progress);
        });
        progress.addEventListener('mousemove', function (e) {
            return mousedown && scrub(e, video, progress);
        });
        progress.addEventListener('mousedown', function () {
            return mousedown = true;
        });
        progress.addEventListener('mouseup', function () {
            return mousedown = false;
        });
        fullScreenButton.addEventListener('click', function (e) {
            return toggleFullScreen(player, fullScreenButton);
        });
        addListenerMulti(player, 'webkitfullscreenchange mozfullscreenchange fullscreenchange MSFullscreenChange', function (e) {
            return onFullScreen(e, player);
        });
    });

    function showControls(video) {

        video.setAttribute("controls", "controls");
    }

    function togglePlay(video, player) {
        var method = video.paused ? 'play' : 'pause';
        video[method]();
        video.paused ? player.classList.remove('is-playing') : player.classList.add('is-playing');
    }

    function updateButton(video, toggle) {
        var icon = video.paused ? iconPlay : iconPause;
        toggle.forEach(function (button) {
            return button.innerHTML = icon;
        });
    }

    function skip() {
        video.currentTime += parseFloat(this.dataset.skip);
    }

    function toggleVolume(video, volumeButton) {
        var level = video.volume;
        var icon = iconVolumeMedium;
        if (level == 1) {
            level = 0;
            icon = iconVolumeMute;
        } else if (level == 0.5) {
            level = 1;
            icon = iconVolumeMedium;
        } else {
            level = 0.5;
            icon = iconVolumeLow;
        }
        video['volume'] = level;
        volumeButton.innerHTML = icon;
    }

    function handleRangeUpdate() {
        video[this.name] = this.value;
    }

    function handleProgress(video, progressBar) {
        var percent = video.currentTime / video.duration * 100;
        progressBar.style.flexBasis = percent + '%';
    }

    function scrub(e, video, progress) {
        var scrubTime = e.offsetX / progress.offsetWidth * video.duration;
        video.currentTime = scrubTime;
    }

    function wrapPlayers() {

        var videos = document.querySelectorAll('video');

        videos.forEach(function (video) {

            var wrapper = document.createElement('div');
            wrapper.classList.add('ckin__player');

            video.parentNode.insertBefore(wrapper, video);

            wrapper.appendChild(video);
        });
    }

    function buildControls(skin) {
        var html = [];
        html.push('<button class="' + skin + '__button--big toggle" title="Toggle Play">' + iconPlay + '</button>');

        html.push('<div class="' + skin + '__controls ckin__controls">');

        html.push('<button class="' + skin + '__button toggle" title="Toggle Video">' + iconPlay + '</button>', '<div class="progress">', '<div class="progress__filled"></div>', '</div>', '<button class="' + skin + '__button volume" title="Volume">' + iconVolumeMedium + '</button>', '<button class="' + skin + '__button fullscreen" title="Full Screen">' + iconExpand + '</button>');

        html.push('</div>');

        return html.join('');
    }

    function attachSkin(skin) {
        if (typeof skin != 'undefined' && skin != '') {
            return skin;
        } else {
            return 'default';
        }
    }

    function showTitle(skin, title) {
        if (typeof title != 'undefined' && title != '') {
            return '<div class="' + skin + '__title">' + title + '</div>';
        } else {
            return false;
        }
    }

    function addOverlay(player, overlay) {

        if (overlay == 1) {
            player.classList.add('ckin__overlay');
        } else if (overlay == 2) {
            player.classList.add('ckin__overlay--2');
        } else {
            return;
        }
    }

    function addColor(player, color) {
        if (typeof color != 'undefined' && color != '') {
            var buttons = player.querySelectorAll('button');
            var progress = player.querySelector('.progress__filled');
            progress.style.background = color;
            buttons.forEach(function (button) {
                return button.style.color = color;
            });
        }
    }

    function toggleFullScreen(player, fullScreenButton) {
        // let isFullscreen = false;
        if (!document.fullscreenElement && // alternative standard method
                !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
            player.classList.add('ckin__fullscreen');

            if (player.requestFullscreen) {
                player.requestFullscreen();
            } else if (player.mozRequestFullScreen) {
                player.mozRequestFullScreen(); // Firefox
            } else if (player.webkitRequestFullscreen) {
                player.webkitRequestFullscreen(); // Chrome and Safari
            } else if (player.msRequestFullscreen) {
                player.msRequestFullscreen();
            }
            isFullscreen = true;

            fullScreenButton.innerHTML = iconCompress;
        } else {
            player.classList.remove('ckin__fullscreen');

            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
            isFullscreen = false;
            fullScreenButton.innerHTML = iconExpand;
        }
    }

    function onFullScreen(e, player) {
        var isFullscreenNow = document.webkitFullscreenElement !== null;
        if (!isFullscreenNow) {
            player.classList.remove('ckin__fullscreen');
            player.querySelector('.fullscreen').innerHTML = iconExpand;
        } else {
            // player.querySelector('.fullscreen').innerHTML = iconExpand;

        }
    }

    function addListenerMulti(element, eventNames, listener) {
        var events = eventNames.split(' ');
        for (var i = 0, iLen = events.length; i < iLen; i++) {
            element.addEventListener(events[i], listener, false);
        }
    }

</script>

<div className="wrapper row3">
    <main className="hoc container clear">

        <div id="form-main">
            <div id="form-div">
                <form class="form" id="form1" method="POST" action="<?php echo URL . "video/adicionar-comentario" ?>">
                    <p class="text">
                        <textarea name="conteudo" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Comentar"></textarea>
                    </p>


                    <div class="submit">
                        <input type="hidden" name="created" value="<?php
                        $hora = date('d/m/Y');
                        echo $hora
                        ?>" />
                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['usuario_id'] ?>" />
                        <input type="hidden" name="video_id" value="<?php echo $id ?>" />
                        <button type="submit" name="sendComentario" id="button-blue">Comentar</button>
                        <div class="ease"></div>
                    </div>
                </form>
            </div>
            <div className="clear"></div>
    </main>
</div>
<div class="comments-container">
    <h1>Comentarios</h1>

    <ul id="comments-list" class="comments-list">
        <?php
        if (!empty($this->Dados['comentario'])) {
            foreach ($this->Dados['comentario'] as $Comentario) {
                extract($Comentario);
                ?>
                <li>
                    <div class='comment-main-level'>

                        <div class='comment-avatar'><img src='data:image/png;base64,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' alt=''/></div>

                        <div class='comment-box'>
                            <div class='comment-head'>

                                <h6 class='comment-name <?php if($adms_niveis_acesso_id == 1){ echo "by-author";}?>'><a href='http://creaticode.com/blog'><?php echo $nome_user ?></a></h6>
                                <span>hace 20 minutos</span>
                                <i class='fa fa-reply'></i>
                                <i class='fa fa-heart'></i>
                            </div>
                            <div class='comment-content'>
                                <?php echo $conteudo?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <?php
            if (empty($this->Dados['comentario'])) {
                echo "<li>
            <div class='comment-main-level'>

                <div class='comment-avatar'><img src='data:image/jpeg;base64,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' alt=''/></div>

                <div class='comment-box'>
                    <div class='comment-head'>
                        <h6 class='comment-name by-system'><a href='http://creaticode.com/blog'>BOT TELEFILMES</a></h6>
                        <span>indisponível</span>
                        <i class='fa fa-reply'></i>
                        <i class='fa fa-heart'></i>
                    </div>
                    <div class='comment-content'>
                        Nenhum comentário encontrado!
                    </div>
                </div>
            </div>
        </li>";
            }
            ?>

    </ul>
</div>
<div className="wrapper row4">

</div>