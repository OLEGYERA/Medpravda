/* страница входа*/
var startPage = 'https://medpravda.ua/greateidea';
var urlSuccess = 'https://medpravda.ua/greateidea-success';
var urlFail = 'https://medpravda.ua/greateidea-fail';
/* входящие данные */
var idIndex = '#RKb6SOSTH9Gt3I8aLrzsBvicu1541758683'
var idCompany = 1564;
var scenario = [["#menu-main",1000],["#menu-drugs",1000],["#menu-tops",1000],["#menu-rek",1000]];
var bannerId = '#adv-brand';
var persentage = [1, 4, 7, 10, 13, 15];

/* main vars */
var step = 0;
var rotation = 0;
var hrefs = null;
var bannerDone = false;
var ustroistvo = parseInt(Math.random() * 99);
var bannerClick = parseInt(Math.random() * 99);
var opened = true;
/* генерируем устр-во */
function genDevice(r) {
    ustroistvo >= 1 && ustroistvo <= 15 ? true : false;
    bannerClick = bannerClick <= 1 ? true : false;
//bannerClick = bannerClick >= 1 && bannerClick <= 2 ? true : false;
    var setts = {};

    if (ustroistvo >= persentage[0] && ustroistvo <= persentage[1]) {
        view_w = 375
        view_h = 736
        var bannerId = '.div-adriver a';
    } else if (ustroistvo > persentage[1] && ustroistvo <= persentage[2]) {
        view_w = 1366
        view_h = 766
    } else if (ustroistvo > persentage[2] && ustroistvo <= persentage[3]) {
        view_w = 1280
        view_h = 1024
    } else if (ustroistvo > persentage[3] && ustroistvo <= persentage[4]) {
        view_w = 1680
        view_h = 850
    } else if (ustroistvo > persentage[4] && ustroistvo <= persentage[5]) {
        view_w = 1440
        view_h = 850
    } else {
        view_w = 1920
        view_h = 1080
    }
    scenario = bannerClick ? [] : scenario

    setts['view_w'] = view_w;
    setts['view_h'] = view_h;
    setts['scenario'] = scenario;

    console.log(view_w, view_h, 'баннер', bannerClick);
    return setts;
}



/* ЮзерАгенты */

var userAgents = ["Mozilla/5.0 (Windows NT 5.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1", "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0", "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0", "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0", "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0", "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0", "Mozilla/5.0 (Windows NT 6.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0", "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0", "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0", "Mozilla/5.0 (Windows NT 5.1; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0", "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:59.0) Gecko/20100101 Firefox/59.0", "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0", "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0", "Mozilla/5.0 (Windows NT 5.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0", "Mozilla/5.0 (Windows NT 6.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0", "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0", "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0", "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:59.0) Gecko/20100101 Firefox/59.0", "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0", "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0", "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0", "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0", "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0", "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0", "Mozilla/5.0 (X11; Linux x86_64; rv:10.0) Gecko/20150101 Firefox/47.0 (Chrome)", "Mozilla/5.0 (Windows NT 6.1; rv:45.0) Gecko/20100101 Firefox/45.0", "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0", "Mozilla/5.0 (Windows NT 6.1; rv:52.0) Gecko/20100101 Firefox/52.0", "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0", "Mozilla/5.0 (Windows NT 5.1; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0", "Mozilla/5.0 (Windows NT 6.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0", "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0", "Mozilla/5.0 (Windows NT 5.1; rv:52.0) Gecko/20100101 Firefox/52.0", "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0", "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0","Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…L, like Gecko) Chrome/60.0.3112.113 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebK…ML, like Gecko) Chrome/60.0.3112.90 Safari/537.36", "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36…L, like Gecko) Chrome/44.0.2403.157 Safari/537.36", "Mozilla/5.0 (Windows NT 5.1; Win64; x64) AppleWebK…ML, like Gecko) Chrome/60.0.3112.90 Safari/537.36", "Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebK…ML, like Gecko) Chrome/60.0.3112.90 Safari/537.36", "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebK…L, like Gecko) Chrome/60.0.3112.113 Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…L, like Gecko) Chrome/57.0.2987.133 Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…ML, like Gecko) Chrome/60.0.3112.90 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebK…L, like Gecko) Chrome/57.0.2987.133 Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…ML, like Gecko) Chrome/55.0.2883.87 Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…ML, like Gecko) Chrome/63.0.3239.84 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebK…ML, like Gecko) Chrome/55.0.2883.87 Safari/537.36", "Mozilla/5.0 (Linux; Android 4.4.2; XMP-6250 Build/…800f99d) RK3188-ADAPI/1.2.84.533 (MODEL:XMP-6250)", "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53…ML, like Gecko) Chrome/46.0.2490.80 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53…L, like Gecko) Chrome/51.0.2704.106 Safari/537.36", "Mozilla/5.0 (Linux; Android 6.0.1; SM-G532G Build/…e Gecko) Chrome/63.0.3239.83 Mobile Safari/537.36", "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53…L, like Gecko) Chrome/48.0.2564.109 Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…L, like Gecko) Chrome/63.0.3239.132 Safari/537.36", "Mozilla/5.0 (Linux; Android 6.0; vivo 1713 Build/M… Gecko) Chrome/53.0.2785.124 Mobile Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…ML, like Gecko) Chrome/62.0.3202.89 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53…ML, like Gecko) Chrome/51.0.2704.63 Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…L, like Gecko) Chrome/66.0.3359.181 Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5…L, like Gecko) Chrome/52.0.2743.116 Safari/537.36", "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K…L, like Gecko) Chrome/49.0.2623.112 Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…L, like Gecko) Chrome/61.0.3163.100 Safari/537.36", "Mozilla/5.0 (Linux; Android 7.1; Mi A1 Build/N2G47…e Gecko) Chrome/58.0.3029.83 Mobile Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…L, like Gecko) Chrome/66.0.3359.117 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53…ML, like Gecko) Chrome/43.0.2357.65 Safari/537.36", "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebK…L, like Gecko) Chrome/57.0.2987.133 Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…ML, like Gecko) Chrome/54.0.2840.99 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebK…ML, like Gecko) Chrome/62.0.3202.89 Safari/537.36", "Mozilla/5.0 (Linux; Android 5.1; A37f Build/LMY47V…e Gecko) Chrome/43.0.2357.93 Mobile Safari/537.36", "Mozilla/5.0 (Windows NT 6.0; Win64; x64) AppleWebK…L, like Gecko) Chrome/57.0.2987.133 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53…L, like Gecko) Chrome/52.0.2743.116 Safari/537.36", "Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebK…L, like Gecko) Chrome/57.0.2987.133 Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…L, like Gecko) Chrome/65.0.3325.181 Safari/537.36", "Mozilla/5.0 (Windows NT 5.1; Win64; x64) AppleWebK…L, like Gecko) Chrome/57.0.2987.133 Safari/537.36", "Mozilla/5.0 (Linux; Android 6.0.1; CPH1607 Build/M…ion/4.0 Chrome/63.0.3239.111 Mobile Safari/537.36", "Mozilla/5.0 (Linux; Android 6.0.1; vivo 1603 Build…e Gecko) Chrome/58.0.3029.83 Mobile Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…L, like Gecko) Chrome/58.0.3029.110 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebK…ML, like Gecko) Chrome/54.0.2840.99 Safari/537.36", "Mozilla/5.0 (Linux; Android 6.0.1; Redmi 4A Build/…ion/4.0 Chrome/60.0.3112.116 Mobile Safari/537.36", "Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53…ML, like Gecko) Chrome/46.0.2490.80 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K…L, like Gecko) Chrome/41.0.2272.104 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebK…L, like Gecko) Chrome/60.0.3112.113 Safari/537.36", "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb…L, like Gecko) Chrome/59.0.3071.115 Safari/537.36", "Mozilla/5.0 (Linux; Android 6.0; vivo 1606 Build/M… Gecko) Chrome/53.0.2785.124 Mobile Safari/537.36", "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36…L, like Gecko) Chrome/42.0.2311.135 Safari/537.36", "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) Ap…L, like Gecko) Chrome/61.0.3163.100 Safari/537.36", "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K…ML, like Gecko) Chrome/39.0.2171.95 Safari/537.36"]
var userChange = parseInt(Math.random() * userAgents.length - 1);

/* настройки страницы */
var page = require('webpage').create();
page.settings.userAgent = userAgents[userChange];
//page.settings.userAgent = 'Mozilla/5.0 (Windows; U; Windows NT 5.0; ru-ru) AppleWebKit/533.16 (KHTML, like Gecko)';
page.customHeaders = {
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
    'Accept-Language': 'ru-Ru,ru;q=0.9',
};
/***/
page.settings.loadImages = true;
page.settings.clearMemoryCaches = true;

var setts = genDevice();
page.viewportSize = {
    width: setts.view_w,
    height: setts.view_h
};


page.clearMemoryCache();
page.open(startPage, function (status) {

    function exitAll(a) {
        console.log('удачно', a)
        page.close();
        phantom.exit();
    }

    /* закрываем сессию  принудительно*/
    setTimeout(function () {
        setTimeout(function () {
            exitAll('stoped timeout')
        }, 1)
    }, 50000)

    page.onConsoleMessage = function (msg, lineNum, sourceId) {
        console.log('CONSOLE: ' + msg + ' (from line #' + lineNum + ' in "' + sourceId + '")');
    };

    /* клик по баннеру */
    function bannerOpen(a) {
        console.log('bannerOpen ', a)
        if (a != null) {

            page.open('https:' + a, function (status) {
                if (status == 'success') {
                    bannerClick = false
                    bannerDone = true
                    sendAjax(1)
                } else {
                    bannerClick = false
                    sendAjax(1)
                }
            });
        } else {
            closeSess('no banner')
        }
    }

    /* посылаем аякс о выполнении */
    function sendAjax(succ) {
        urls = succ ? urlSuccess : urlFail;

        if (bannerClick) {
            console.log('gone')

            function getButt() {
                hrefs = page.evaluate(function (bannerId) {
                    if (document.querySelector(bannerId) != null) {
                        return document.querySelector(bannerId).getAttribute('href')
                    } else {
                        return null
                    }
                }, bannerId)
            }

            getButt()
            console.log(hrefs)
            setTimeout(function () {
                if(hrefs != null) {
                    bannerOpen(hrefs)
                }else {
                    urls = bannerDone ? urls + '?id=' + idCompany + '&banner=true' : urls + '?id=' + idCompany;
                    texts = bannerDone ? 'clicked banner' : 'without banner';

                    page.open(urls, function (status) {
                        if (status == 'success') {
                            exitAll(texts)
                        } else {
                            exitAll(texts + 'fail send success')
                        }
                    });
                }
            }, 1000);
        } else {
            urls = bannerDone ? urls + '?id=' + idCompany + '&banner=true' : urls + '?id=' + idCompany;
            texts = bannerDone ? 'clicked banner' : 'without banner';

            page.open(urls, function (status) {
                if (status == 'success') {
                    exitAll(texts)
                } else {
                    exitAll(texts + 'fail send success')
                }
            });
        }


    }

    function nextPage() {
        if (scenario[step]) {
            setTimeout(function () {
                setTimeout(function () {

                    opened = page.evaluate(function (scenario, step) {
                        if (document.querySelector(scenario[step][0]) != undefined) {
                            document.querySelector(scenario[step][0]).click()
                            return true
                        } else {
                            return false
                        }
                    }, scenario, step)

                    setTimeout(function(){
                        if(!opened){sendAjax('scenario[step] cant get scenario step')}
                    },1000)






                }, 1)
            }, scenario[step][1]);
        } else {
            sendAjax('scenario[step] out of range')
        }
        step++
    }


    page.onUrlChanged = function (targetUrl) {
        loaded = 0
        console.log('targetUrl', targetUrl)
        page.onLoadFinished = function (status) {
            if (loaded != 0) {
                return
            }
            loaded++

            if (step < scenario.length - 1) {
                nextPage()
            } else {
                if (bannerClick) {
                    setTimeout(function () {
                        console.log('sendAjax')
                        sendAjax(1)

                    }, 6000)
                } else {
                    sendAjax(1)
                }
            }

        }
    }

    /* переход на страницу входа */
    setTimeout(function () {
        setTimeout(function () {
            function getButt() {
                console.log('go');
                page.evaluate(function (idIndex) {
                    document.querySelector(idIndex).click()
                }, idIndex)
            }

            getButt();
        }, 1)
    }, 1000);

});