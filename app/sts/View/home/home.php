<?php
foreach ($this->Dados['filmes'] as $Filmes) {
    extract($Filmes);
    $a = [$imagem1, $imagem2, $imagem3];

     
   $imagemFilme = $a[mt_rand(0, count($a) - 1)];
}
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

<div class="wrapper bgded overlay" style="background-image:url('http://localhost/telefilmes/assets/aquaman-poster-interna-0.jpg');">
    <div id="pageintro" class="hoc clear"> 
        <!-- ################################################################################################ -->
        <article class="introtxt">
            <h2 class="heading">Aquaman</h2>
            <p>A cidade de Atlantis, que já foi lar de uma das mais avançadas civilizações do mundo, agora é um reino submerso dominado pelo ganancioso Rei Orm</p>
            <footer>
                <ul class="nospace inline pushright">
                    <li><a class="btn" href="#">Assistir</a></li>
                    <li><a class="btn inverse" href="#">Adicionar á Lista</a></li>
                </ul>
            </footer>
        </article>
        <!-- ################################################################################################ -->
    </div>
</div>


<div class="wrapper row4">
    <div class="hoc container clear"> 
        <!-- ################################################################################################ -->
        <ul class="nospace elements">

            <?php
            if (empty($this->Dados['filmes'])) {

                echo "<li class='one_third'>";
                echo "<article>";
                echo "<figure>";
                echo "<img src='https://neilpatel.com/wp-content/uploads/2019/05/ilustracao-sobre-o-error-404-not-found.jpeg' style='width:320px; height:220px' alt='teste'/>";
                echo "<figcaption>";
                echo "<a href='#'>Sem detalhes. &raquo</a>";
                echo "</figcaption>";
                echo "</figure>";
                echo "<div class='txtwrap'>";
                echo "<h6 class='heading'>OOOPPPSSS</h6>";
                echo "<p>Nenhum filme foi encontrado no acervo</p>";
                echo "</div>";
                echo "</article>";
                echo "</li>";
            } else {

                foreach ($this->Dados['filmes'] as $Filmes) {
                    extract($Filmes);

                    echo "<li class='one_third'>";
                    echo "<article>";
                    echo "<figure>";
                    echo "<img src='$imagemFilme'  style='width:320px; height:220px; ' alt=''>";
                    echo "<figcaption>";
                    echo "<a href='" . URL . "video/assistir/$id'>Assistir &raquo</a><br/><br/>";
                    echo "<a href='" . URL . "video/adicionarLista/$id'>Add na lista &raquo</a>";
                    echo "</figcaption>";
                    echo "</figure>";
                    echo "<div class='txtwrap'>";
                    echo "<h6 class='heading'>$nome_filme</h6>";
                    echo "<p>$sinopse...</p>";
                    echo" </div>";
                    echo "</article>";
                    echo " </li>";
                }
            }
            ?>
        </ul>
        <!-- ################################################################################################ -->
        <div class="clear"></div>
    </div>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
