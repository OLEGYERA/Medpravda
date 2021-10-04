/* initial vars */

var campanyId = {{ $model->id ?? 555555}};
var pageIndex = 'https://medpravda.ua/greateidea';
var idIndex = '#{{ $model->href_id }}' //id ссылки на первой странице;
var scenario = {!! (json_encode($scenario))  !!};
var urlSuccess = 'https://medpravda.ua/greateidea-success';
var urlFail = 'https://medpravda.ua/greateidea-fail';

/* main vars */
var perehod = 0;
var loaded = 0;

var closeScenario = 0;
var t = Date.now();
var page = require('webpage').create();
page.settings.userAgent = 'Mozilla/5.0 (Windows; U; Windows NT 5.0; ru-ru) AppleWebKit/533.16 (KHTML, like Gecko)';
page.customHeaders = {
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
    'Accept-Language': 'ru-Ru,ru;q=0.9',
};

page.open(pageIndex, function (status) {

    try {
        if (status !== "success") {
            sendAjax(urlFail)
            console.log("sdUnable to access network");
        } else {
            t = Date.now() - t;
            console.log('Loading time ' + t + ' msec');
        }
    } catch (ex) {

    }


    /* отлавливаем переходы */
    page.onUrlChanged = function (targetUrl) {
        loaded = 0
        page.onLoadFinished = function (status) {
            if (!loaded) {
                return
            }
            loaded++
            if (perehod < scenario.length) {
                setTimeout(function () {
                    page.evaluate(function (scenario, perehod) {
                        if (document.querySelector(scenario[perehod][0]) != undefined) {
                            document.querySelector(scenario[perehod][0]).click()
                        } else {
                            sendAjax(urlFail)
                        }
                    }, scenario, perehod)
                    perehod++
                }, scenario[perehod][1])
            } else {
                sendAjax(urlSuccess)
            }
        }
        console.log('New URL: ' + targetUrl);
    };

    function sendAjax(urls) {
        page.open(urls + '?id=' + campanyId, function (status) {
            if (status == 'success') {
                console.log(status);
                closeSess()
            }
        });
    }

    /* переход на страницу входа */
    setTimeout(function () {
        function getButt() {
            page.evaluate(function (idIndex) {
                document.querySelector(idIndex).click()
            }, idIndex)
        }

        getButt();
    }, 1000);

    function closeSess() {
        phantom.exit();
    }

    /* закрываем сессию */
    setTimeout(function () {
        console.log('close');
        closeSess()
    }, 90000)

});

{{--october 26 , before slimer js--}}
var view_w, view_h;

if (mah >=1 && mah <= 4) {
view_w = 375
view_h = 736
var bannerId2 = '.div-adriver a';
}else if (mah >= 5 && mah <= 7) {
view_w = 1366
view_h = 766
}else if (mah >= 8 && mah <= 10) {
view_w = 1280
view_h = 1024
}else if (mah >= 12 && mah <= 13) {
view_w = 1680
view_h = 850
}else if (mah >= 14 && mah <= 15) {
view_w = 1440
view_h = 850
}else {
view_w = 1920
view_h = 1080
}


/* main vars */
var perehod = 0;
var loaded = 0;

var closeScenario = 0;
var t = Date.now();
var page = require('webpage').create();
page.settings.userAgent = 'Mozilla/5.0 (Windows; U; Windows NT 5.0; ru-ru) AppleWebKit/533.16 (KHTML, like Gecko)';
page.customHeaders = {
'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
'Accept-Language': 'ru-Ru,ru;q=0.9',
};

/***/
var hrefs =  null;
page.settings.loadImages = true;
page.settings.clearMemoryCaches = true;

page.viewportSize = {
width: view_w,
height: view_h
};
console.log(m, mah,page.viewportSize.width, page.viewportSize.height)
page.clearMemoryCache();
page.open(pageIndex, function (status) {

try {
if (status !== "success") {
// sendAjax(urlFail)
console.log("sdUnable to access network");
} else {
t = Date.now() - t;
console.log('Loading time ' + t + ' msec');
}
} catch (ex) {

}
page.onConsoleMessage = function(msg, lineNum, sourceId) {
console.log('CONSOLE: ' + msg + ' (from line #' + lineNum + ' in "' + sourceId + '")');
};


function goPage(a) {
console.log('goPage(a)', a)
if(a != null) {
page.viewportSize = {
width: view_w,
height: view_h
};
page.render('a.png');

page.open('https:'+a, function (status) {
if (status == 'success') {
console.log('baner-send-success')
sendAjaxbanner()
}
});
}else {
closeSess('no banner')
}

}
function sendAjaxbanner() {
page.open(urlSuccess + '?id=' + campanyId + '&banner=true', function (status) {
console.log('status', status)
if (status == 'success') {
closeSess('clicked banner')
}
});
}
function sendAjax(urls) {
console.log('ajax')
page.clearMemoryCache();
page.onUrlChanged = function (targetUrl) {
console.log('ajax - go',targetUrl)
page.onLoadFinished = function (status) {

}
}
if (bannerId2 && m) {
console.log('m',m)
page.render('b.png');
console.log(bannerId2,document.querySelector(bannerId2) )
setTimeout(function () {
setTimeout(function () {
function getButt() {
// console.log('img')
// page.render('github.png');
hrefs = page.evaluate(function (bannerId2) {
if(document.querySelector(bannerId2) != null){
// console.log(document.querySelector(bannerId2).getAttribute('href'))
return document.querySelector(bannerId2).getAttribute('href')
}
}, bannerId2, hrefs)
}
getButt()
setTimeout(function () {
goPage(hrefs)
}, 1000);
}, 1)
}, 1000);


} else {
console.log('wout-ban',urls)
page.open(urls + '?id=' + campanyId, function (status) {
console.log(status);
if (status == 'success') {
closeSess('without banner')
}else {
closeSess('without banner fail')
}
});

}
}

/* отлавливаем переходы */
page.onUrlChanged = function (targetUrl) {
loaded = 0
console.log('targetUrl', targetUrl )
page.onLoadFinished = function (status) {
if (loaded != 0) {
return
}
loaded++
if (perehod < scenario.length) {
page.clearMemoryCache();
setTimeout(function () {
setTimeout(function () {
page.evaluate(function (scenario, perehod) {
if (document.querySelector(scenario[perehod][0]) != undefined) {
document.querySelector(scenario[perehod][0]).click()
} else {
// sendAjax(urlFail)
}
}, scenario, perehod)
perehod++
}, 1)
}, scenario[perehod][1])
} else {
if(m){
setTimeout(function () {
// console.log(document.querySelector(bannerId2), document.querySelector(bannerId))
sendAjax(urlSuccess)
}, 15000)
}else {
console.log()
sendAjax(urlSuccess)
}

}
}
// console.log('New URL: ' + targetUrl);
};


/* переход на страницу входа */
setTimeout(function () {
setTimeout(function () {
function getButt() {
page.evaluate(function (idIndex) {
document.querySelector(idIndex).click()
}, idIndex)
}
getButt();
}, 1)
}, 1000);

function closeSess(a) {
console.log('удачно',a)
phantom.exit();
}

/* закрываем сессию */
setTimeout(function () {
setTimeout(function () {
// console.log('close');
closeSess('stoped')
}, 1)
}, 90000)

});

{{-- 23:33 october 26 --}}

var view_w, view_h;

if (mah >=1 && mah <= 4) {
view_w = 375
view_h = 736
var bannerId2 = '.div-adriver a';
}else if (mah >= 5 && mah <= 7) {
view_w = 1366
view_h = 766
}else if (mah >= 8 && mah <= 10) {
view_w = 1280
view_h = 1024
}else if (mah >= 12 && mah <= 13) {
view_w = 1680
view_h = 850
}else if (mah >= 14 && mah <= 15) {
view_w = 1440
view_h = 850
}else {
view_w = 1920
view_h = 1080
}



/* main vars */
var perehod = 0;
var loaded = 0;

var closeScenario = 0;
var t = Date.now();
var page = require('webpage').create();
page.settings.userAgent = 'Mozilla/5.0 (Windows; U; Windows NT 5.0; ru-ru) AppleWebKit/533.16 (KHTML, like Gecko)';
page.customHeaders = {
'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
'Accept-Language': 'ru-Ru,ru;q=0.9',
};

/***/
var hrefs =  null;
page.settings.loadImages = true;
page.settings.clearMemoryCaches = true;

page.viewportSize = {
width: view_w,
height: view_h
};
console.log(m, mah,page.viewportSize.width, page.viewportSize.height)
// page.clearMemoryCache();
page.open(pageIndex, function (status) {

try {
if (status !== "success") {
phantom.exit();
console.log("sdUnable to access network");
} else {
t = Date.now() - t;
console.log('Loading time ' + t + ' msec');
}
} catch (ex) {

}
page.onConsoleMessage = function(msg, lineNum, sourceId) {
console.log('CONSOLE: ' + msg + ' (from line #' + lineNum + ' in "' + sourceId + '")');
};



function goPage(a) {
console.log('goPage(a)', a)
if(a != null) {
page.viewportSize = {
width: view_w,
height: view_h
};
// page.render('a.png');

page.open('https:'+a, function (status) {
if (status == 'success') {
console.log('baner-send-success')
sendAjaxbanner()
}
});
}else {
closeSess('no banner')
}

}
function sendAjaxbanner() {
page.open(urlSuccess + '?id=' + campanyId + '&banner=true', function (status) {
console.log('status', status)
if (status == 'success') {
closeSess('clicked banner')
}
});
}
function sendAjax(urls) {
console.log('ajax')
// page.clearMemoryCache();
page.onUrlChanged = function (targetUrl) {
console.log('ajax - go',targetUrl)
page.onLoadFinished = function (status) {

}
}
if (bannerId2 && m) {
console.log('m',m)
// page.render('b.png');
console.log(bannerId2,document.querySelector(bannerId2) )
setTimeout(function () {
setTimeout(function () {
function getButt() {
// console.log('img')
// page.render('github.png');
hrefs = page.evaluate(function (bannerId2) {
if(document.querySelector(bannerId2) != null){
// console.log(document.querySelector(bannerId2).getAttribute('href'))
return document.querySelector(bannerId2).getAttribute('href')
}
}, bannerId2, hrefs)
}
getButt()
setTimeout(function () {
goPage(hrefs)
}, 1000);
}, 1)
}, 1000);


} else {
// console.log('wout-ban',urls)
page.open(urls + '?id=' + campanyId, function (status) {
console.log(status);
if (status == 'success') {
closeSess('without banner')
}else {
closeSess('without banner fail')
}
});

}
}
page.onResourceError = function(resourceError) {
console.log('Unable to load resource (#' + resourceError.id + 'URL:' + resourceError.url + ')');
console.log('Error code: ' + resourceError.errorCode + '. Description: ' + resourceError.errorString);
page.includeJs("https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js", function() {

page.evaluateAsync(function() {
$.ajax({url: urlFail, success: function() {console.log('done')}});
});

});
};

/* отлавливаем переходы */
page.onUrlChanged = function (targetUrl) {
loaded = 0
console.log('targetUrl', targetUrl )
page.onLoadFinished = function (status) {
if (loaded != 0) {
return
}
loaded++
if (perehod < scenario.length) {
// page.clearMemoryCache();
setTimeout(function () {
setTimeout(function () {
page.evaluate(function (scenario, perehod) {
if (document.querySelector(scenario[perehod][0]) != undefined) {
document.querySelector(scenario[perehod][0]).click()
} else {
// sendAjax(urlFail)
}
}, scenario, perehod)
perehod++
}, 1)
}, scenario[perehod][1])
} else {

if(m){
setTimeout(function () {
// console.log(document.querySelector(bannerId2), document.querySelector(bannerId))
sendAjax(urlSuccess)
}, 15000)
}else {
sendAjax(urlSuccess)
}

}
}
// console.log('New URL: ' + targetUrl);
};


/* переход на страницу входа */
setTimeout(function () {
setTimeout(function () {
function getButt() {
page.evaluate(function (idIndex) {
document.querySelector(idIndex).click()
}, idIndex)
}
getButt();
}, 1)
}, 1000);

function closeSess(a) {
console.log('удачно',a)
phantom.exit();
}

/* закрываем сессию */
setTimeout(function () {
setTimeout(function () {
// console.log('close');
closeSess('stoped')
}, 1)
}, 90000)

});