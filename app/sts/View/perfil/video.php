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

<div class="form_wrapper">
    <div class="form_container">
        <div class="title_container">
            <h2>Registrar video</h2>
        </div>
        <div class="row clearfix">
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <div class="">
                <form method="POST" action="">
                    
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="text" name="link1" placeholder="Link1" required />
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="text" name="link2" placeholder="Link2" required/>
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="text" name="link3"  placeholder="Link3"  required/>
                    </div>
                    
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="text" name="duracao"  placeholder="Duração"  required/>
                    </div>
                    <div class="input_field select_option">
                        <select>
                            <option>Selecione o perfil</option>
                            <?php
                                foreach ($this->Dados['listFilm'] as $List){
                                    extract($List);
                               
                            ?>
                            <option value="<?php echo $id?>"><?php echo $nome_filme?></option>
                            
                            <?php
                                }
                            ?>
                        </select>
                        <div class="select_arrow"></div>
                    </div>
                    <!--
                    <div class="row clearfix">
                      <div class="col_half">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="First Name" />
                        </div>
                      </div>
                      <div class="col_half">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                          <input type="text" name="name" placeholder="Last Name" required />
                        </div>
                      </div>
                    </div>
           
                        <div class="input_field select_option">
                          <select>
                            <option>Select a country</option>
                            <option>Option 1</option>
                            <option>Option 2</option>
                          </select>
                          <div class="select_arrow"></div>
                        </div>
                    -->        
                    <input class="button" type="submit" name="sendCate" value="Cadastrar video" />
                </form>
            </div>
        </div>
    </div>
</div>