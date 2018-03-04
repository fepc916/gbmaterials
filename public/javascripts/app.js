(function() {

    var app = angular.module("app", ["ui.router", "angular-jwt"]);


    app.controller("homeCtrl", ["$scope", function($scope) {

    }]);

    app.controller("contactoCtrl", ["$scope", function($scope) {

    }]);


    //DIRECTIVES
    app.directive("publicTop", function() {
        return {
            restrict: "E",
            templateUrl: "public/views/directives/public_top.html"
        }
    });

    app.directive("publicBanner", function() {
        return {
            restrict: "E",
            templateUrl: "public/views/directives/public_banner.html"
        }
    });

    app.directive("publicBanners", function() {
        return {
            restrict: "E",
            templateUrl: "public/views/directives/public_banners.html"
        }
    });

    app.directive("publicFooter", function() {
        return {
            restrict: "E",
            templateUrl: "public/views/directives/public_footer.html"
        }
    });

    app.directive("dashboardTop", function() {
        return {
            restrict: "E",
            templateUrl: "public/views/directives/dashboard_top.html"
        }
    });


    //CONFIG
    app.config(function($urlRouterProvider, $stateProvider) {
        $urlRouterProvider.otherwise("/");

        $stateProvider.state("home", {
            url: "/",
            views: {
                "home": {
                    templateUrl: "public/views/pages/home/home.html",
                    controller: "homeCtrl"
                }
            }
        }).state("about", {
            url: "/nosotros",
            views: {
                "about": {
                    templateUrl: "public/views/pages/home/about.html"
                }
            }
        }).state("services", {
            url: "/servicios",
            views: {
                "services": {
                    templateUrl: "public/views/pages/home/services.html"
                }
            }
        }).state("contact", {
            url: "/contacto",
            views: {
                "contact": {
                    templateUrl: "public/views/pages/home/contact.html"
                }
            }
        }).state("login", {
            url: "/login",
            views: {
                "login": {
                    templateUrl: "public/views/pages/home/login.html"
                }
            }
        }).state("dashboard", {
            url: "/panel",
            views: {
                "dashboard": {
                    templateUrl: "public/views/pages/dashboard/panel.html"
                }
            }
        }).state("dash_contact", {
            url: "/panel_contacto",
            views: {
                "dash_contact": {
                    templateUrl: "public/views/pages/dashboard/contacto/contacto.html"
                }
            }
        }).state("test1", {
            url: "/test1",
            views: {
                "test1": {
                    templateUrl: "public/views/pages/test/test1.html"
                }
            }
        });
        //end config
    });

})();