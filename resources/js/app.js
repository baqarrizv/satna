/*
Template Name: Minible - Admin & Dashboard Template
Author: Themesbrand
Version: 2.6.0
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Main Js File
*/

(function ($) {
    "use strict";

    function initMetisMenu() {
        //metis menu
        $("#side-menu").metisMenu();
    }

    function initLeftMenuCollapse() {
        var currentSIdebarSize =
            document.body.getAttribute("data-sidebar-size");
        $(window).on("load", function () {
            $(".switch").on("switch-change", function () {
                toggleWeather();
            });

            if (window.innerWidth >= 1024 && window.innerWidth <= 1366) {
                document.body.setAttribute("data-sidebar-size", "sm");
            }
        });

        $(".vertical-menu-btn").on("click", function (event) {
            event.preventDefault();
            $("body").toggleClass("sidebar-enable");
            if ($(window).width() >= 992) {
                if (currentSIdebarSize == null) {
                    document.body.getAttribute("data-sidebar-size") == null ||
                    document.body.getAttribute("data-sidebar-size") == "lg"
                        ? document.body.setAttribute("data-sidebar-size", "sm")
                        : document.body.setAttribute("data-sidebar-size", "lg");
                } else if (currentSIdebarSize == "md") {
                    document.body.getAttribute("data-sidebar-size") == "md"
                        ? document.body.setAttribute("data-sidebar-size", "sm")
                        : document.body.setAttribute("data-sidebar-size", "md");
                } else {
                    document.body.getAttribute("data-sidebar-size") == "sm"
                        ? document.body.setAttribute("data-sidebar-size", "lg")
                        : document.body.setAttribute("data-sidebar-size", "sm");
                }
            }
        });
    }

    function initActiveMenu() {
        // === following js will activate the menu in left side bar based on url ====
        $("#sidebar-menu a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("mm-active"); // add active to li of the current link
                $(this).parent().parent().addClass("mm-show");
                $(this).parent().parent().prev().addClass("mm-active"); // add active class to an anchor
                $(this).parent().parent().parent().addClass("mm-active");
                $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link
                $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .addClass("mm-active");
            }
        });
    }

    function initMenuItemScroll() {
        // focus active menu in left sidebar
        $(document).ready(function () {
            if (
                $("#sidebar-menu").length > 0 &&
                $("#sidebar-menu .mm-active .active").length > 0
            ) {
                var activeMenu = $("#sidebar-menu .mm-active .active").offset()
                    .top;
                if (activeMenu > 300) {
                    activeMenu = activeMenu - 300;
                    $(".vertical-menu .simplebar-content-wrapper").animate(
                        { scrollTop: activeMenu },
                        "slow"
                    );
                }
            }
        });
    }

    function initHoriMenuActive() {
        $(".navbar-nav a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("active");
                $(this).parent().parent().addClass("active");
                $(this).parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().addClass("active");
                $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .addClass("active");
            }
        });
    }

    function initFullScreen() {
        $('[data-bs-toggle="fullscreen"]').on("click", function (e) {
            e.preventDefault();
            $("body").toggleClass("fullscreen-enable");
            if (
                !document.fullscreenElement &&
                /* alternative standard method */ !document.mozFullScreenElement &&
                !document.webkitFullscreenElement
            ) {
                // current working methods
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(
                        Element.ALLOW_KEYBOARD_INPUT
                    );
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
            }
        });
        document.addEventListener("fullscreenchange", exitHandler);
        document.addEventListener("webkitfullscreenchange", exitHandler);
        document.addEventListener("mozfullscreenchange", exitHandler);
        function exitHandler() {
            if (
                !document.webkitIsFullScreen &&
                !document.mozFullScreen &&
                !document.msFullscreenElement
            ) {
                console.log("pressed");
                $("body").removeClass("fullscreen-enable");
            }
        }
    }

    function initDropdownMenu() {
        if (document.getElementById("topnav-menu-content")) {
            var elements = document
                .getElementById("topnav-menu-content")
                .getElementsByTagName("a");
            for (var i = 0, len = elements.length; i < len; i++) {
                elements[i].onclick = function (elem) {
                    if (elem.target.getAttribute("href") === "#") {
                        elem.target.parentElement.classList.toggle("active");
                        elem.target.nextElementSibling.classList.toggle("show");
                    }
                };
            }
            window.addEventListener("resize", updateMenu);
        }
    }

    function updateMenu() {
        var elements = document
            .getElementById("topnav-menu-content")
            .getElementsByTagName("a");
        for (var i = 0, len = elements.length; i < len; i++) {
            if (
                elements[i].parentElement.getAttribute("class") ===
                "nav-item dropdown active"
            ) {
                elements[i].parentElement.classList.remove("active");
                elements[i].nextElementSibling.classList.remove("show");
            }
        }
    }

    function initComponents() {
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        var popoverTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="popover"]')
        );
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });

        // Counter Up
        var delay = $(this).attr("data-delay")
            ? $(this).attr("data-delay")
            : 100; //default is 100
        var time = $(this).attr("data-time") ? $(this).attr("data-time") : 1200; //default is 1200
        $('[data-plugin="counterup"]').each(function (idx, obj) {
            $(this).counterUp({
                delay: delay,
                time: time,
            });
        });
    }

    function initPreloader() {
        $(window).on("load", function () {
            $("#status").fadeOut();
            $("#preloader").delay(350).fadeOut("slow");
        });
    }

    // Initialize settings on page load
    function initSettings() {
        if (window.localStorage) {
            // Get the stored theme from localStorage or sessionStorage
            var theme =
                localStorage.getItem("theme") ||
                sessionStorage.getItem("theme");

            // If no theme is stored or not valid, set default to light
            if (!theme || (theme !== "light" && theme !== "dark")) {
                localStorage.setItem("theme", "light");
                sessionStorage.setItem("theme", "light");
                applyTheme("light"); // Apply the light theme initially
            } else {
                // Fix for "darkbut" value - normalize to "dark"
                if (theme.startsWith("dark")) {
                    theme = "dark";
                    localStorage.setItem("theme", "dark");
                    sessionStorage.setItem("theme", "dark");
                }
                applyTheme(theme); // Apply the stored theme
            }
        }
    }

    // Apply the theme based on stored value
    function applyTheme(theme) {
        var body = document.getElementsByTagName("body")[0];

        if (theme === "dark") {
            document.body.setAttribute("data-bs-theme", "dark");
            document.body.setAttribute("data-topbar", "dark");
            document.body.setAttribute("data-sidebar", "dark");
            body.hasAttribute("data-layout") &&
            body.getAttribute("data-layout") == "horizontal"
                ? ""
                : document.body.setAttribute("data-sidebar", "dark");
        } else {
            document.body.setAttribute("data-bs-theme", "light");
            document.body.setAttribute("data-topbar", "light");
            document.body.setAttribute("data-sidebar", "light");
            body.hasAttribute("data-layout") &&
            body.getAttribute("data-layout") == "horizontal"
                ? ""
                : document.body.setAttribute("data-sidebar", "light");
        }

        // Dispatch an event that other scripts can listen for
        var themeChangeEvent = new CustomEvent("themeChanged", {
            detail: { theme: theme },
        });
        document.dispatchEvent(themeChangeEvent);
    }

    // Immediately apply theme on page load before DOM is ready
    (function () {
        // Try to get theme from both storage types
        if (window.localStorage || window.sessionStorage) {
            var storedTheme =
                localStorage.getItem("theme") ||
                sessionStorage.getItem("theme");
            if (storedTheme === "dark" || storedTheme === "darkbut") {
                document.documentElement.setAttribute("data-bs-theme", "dark");
                document.documentElement.setAttribute("data-topbar", "dark");
                document.documentElement.setAttribute("data-sidebar", "dark");
            }
        }
    })();

    // Handle the theme toggle button
    function layoutSetting() {
        var body = document.getElementsByTagName("body")[0];

        $("#mode-setting-btn").on("click", function (e) {
            // Toggle between light and dark mode
            if (
                body.hasAttribute("data-bs-theme") &&
                body.getAttribute("data-bs-theme") == "dark"
            ) {
                localStorage.setItem("theme", "light");
                sessionStorage.setItem("theme", "light");
                applyTheme("light");
            } else {
                localStorage.setItem("theme", "dark");
                sessionStorage.setItem("theme", "dark");
                applyTheme("dark");
            }
        });

        // Ensure toggle button state matches current theme
        var currentTheme =
            localStorage.getItem("theme") || sessionStorage.getItem("theme");

        if (currentTheme === "dark" || currentTheme === "darkbut") {
            // If we're in dark mode, make sure checkbox is checked
            $("#mode-setting-btn").prop("checked", true);
        } else {
            // If we're in light mode, make sure checkbox is unchecked
            $("#mode-setting-btn").prop("checked", false);
        }
    }

    function init() {
        // Priority: load theme settings first to prevent flickering
        initSettings();

        // Then initialize other components
        initMetisMenu();
        initLeftMenuCollapse();
        initActiveMenu();
        initMenuItemScroll();
        initFullScreen();
        initHoriMenuActive();
        initDropdownMenu();
        initComponents();
        initPreloader();
        layoutSetting();
        Waves.init();
    }

    // Execute initialization as soon as DOM is ready
    $(document).ready(function () {
        init();
        initSettings();
    });
})(jQuery);
