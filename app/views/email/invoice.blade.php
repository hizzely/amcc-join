<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title>Invoice AMCC</title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
    <style>
      html,
      body {
        margin: 0 auto !important;
        padding: 0 !important;
        height: 100% !important;
        width: 100% !important;
        background: #f1f1f1;
      }

      /* What it does: Stops email clients resizing small text. */
      * {
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
      }

      /* What it does: Centers email on Android 4.4 */
      div[style*="margin: 16px 0"] {
        margin: 0 !important;
      }

      /* What it does: Stops Outlook from adding extra spacing to tables. */
      table,
      td {
        mso-table-lspace: 0pt !important;
        mso-table-rspace: 0pt !important;
      }

      /* What it does: Fixes webkit padding issue. */
      table {
        border-spacing: 0 !important;
        border-collapse: collapse !important;
        table-layout: fixed !important;
        margin: 0 auto !important;
      }

      /* What it does: Uses a better rendering method when resizing images in IE. */
      img {
        -ms-interpolation-mode: bicubic;
      }

      /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
      a {
        text-decoration: none;
      }

      /* What it does: A work-around for email clients meddling in triggered links. */
      *[x-apple-data-detectors],
      /* iOS */
      .unstyle-auto-detected-links *,
      .aBn {
        border-bottom: 0 !important;
        cursor: default !important;
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
      }

      /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
      .a6S {
        display: none !important;
        opacity: 0.01 !important;
      }

      /* What it does: Prevents Gmail from changing the text color in conversation threads. */
      .im {
        color: inherit !important;
      }

      /* If the above doesn't work, add a .g-img class to any image in question. */
      img.g-img+div {
        display: none !important;
      }

      /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
      /* Create one of these media queries for each additional viewport size you'd like to fix */

      /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
      @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
        u~div .email-container {
          min-width: 320px !important;
        }
      }

      /* iPhone 6, 6S, 7, 8, and X */
      @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
        u~div .email-container {
          min-width: 375px !important;
        }
      }

      /* iPhone 6+, 7+, and 8+ */
      @media only screen and (min-device-width: 414px) {
        u~div .email-container {
          min-width: 414px !important;
        }
      }

      .primary {
        background: #2f89fc;
      }

      .bg_white {
        background: #ffffff;
      }

      .bg_light {
        background: #fafafa;
      }

      .bg_black {
        background: #000000;
      }

      .bg_dark {
        background: rgba(0, 0, 0, .8);
      }

      .email-section {
        padding: 2.5em;
      }

      /*BUTTON*/
      .btn {
        padding: 5px 15px;
        display: inline-block;
      }

      .btn.btn-primary {
        border-radius: 5px;
        background: #2f89fc;
        color: #ffffff;
      }

      .btn.btn-white {
        border-radius: 5px;
        background: #ffffff;
        color: #000000;
      }

      .btn.btn-white-outline {
        border-radius: 5px;
        background: transparent;
        border: 1px solid #fff;
        color: #fff;
      }

      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
        font-family: 'Work Sans', sans-serif;
        color: #000000;
        margin-top: 0;
        font-weight: 400;
      }

      body {
        font-family: 'Work Sans', sans-serif;
        font-weight: 400;
        font-size: 15px;
        line-height: 1.8;
        color: rgba(0, 0, 0, .4);
      }

      a {
        color: #2f89fc;
      }

      /*LOGO*/

      .logo h1 {
        margin: 0;
      }

      .logo h1 a {
        color: #000000;
        font-size: 20px;
        font-weight: 700;
        text-transform: uppercase;
        font-family: 'Poppins', sans-serif;
      }

      .navigation {
        padding: 0;
      }

      .navigation li {
        list-style: none;
        display: inline-block;
        ;
        margin-left: 5px;
        font-size: 13px;
        font-weight: 500;
      }

      .navigation li a {
        color: rgba(0, 0, 0, .4);
      }

      /*HERO*/
      .hero {
        position: relative;
        z-index: 0;
      }

      .hero .text {
        color: rgba(0, 0, 0, .3);
      }

      .hero .text h2 {
        color: #000;
        font-size: 30px;
        margin-bottom: 0;
        font-weight: 300;
      }

      .hero .text h2 span {
        font-weight: 600;
        color: #2f89fc;
      }


      /*HEADING SECTION*/
      .heading-section h2 {
        color: #000000;
        font-size: 28px;
        margin-top: 0;
        line-height: 1.4;
        font-weight: 400;
      }

      .heading-section .subheading {
        margin-bottom: 20px !important;
        display: inline-block;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: rgba(0, 0, 0, .4);
        position: relative;
      }

      .heading-section .subheading::after {
        position: absolute;
        left: 0;
        right: 0;
        bottom: -10px;
        content: '';
        width: 100%;
        height: 2px;
        background: #2f89fc;
        margin: 0 auto;
      }

      .heading-section-white {
        color: rgba(255, 255, 255, .8);
      }

      .heading-section-white h2 {
        font-family: 'Work Sans', sans-serif;
        line-height: 1;
        padding-bottom: 0;
      }

      .heading-section-white h2 {
        color: #ffffff;
      }

      .heading-section-white .subheading {
        margin-bottom: 0;
        display: inline-block;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: rgba(255, 255, 255, .4);
      }

      /*PROJECT*/
      .text-project {
        padding-top: 10px;
      }

      .text-project h3 {
        margin-bottom: 0;
      }

      .text-project h3 a {
        color: #000;
      }

      /*FOOTER*/

      .footer {
        color: rgba(255, 255, 255, .5);

      }

      .footer .heading {
        color: #ffffff;
        font-size: 20px;
      }

      .footer ul {
        margin: 0;
        padding: 0;
      }

      .footer ul li {
        list-style: none;
        margin-bottom: 10px;
      }

      .footer ul li a {
        color: rgba(255, 255, 255, 1);
      }
      
      @media screen and (max-width: 500px) {}
    </style>
</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #222222;">
	<center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
      <div style="width: 100%; height: 24px; background: #0799da"></div>
    	<!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em;">
          	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
          		<tr>
                <td class="logo" style="text-align: center; padding-top: 48px;">
			            <a href="#">
                    <img src="{{ getenv('APP_URL') }}/img/amcc-logo.png" width="96" height="96" />
                  </a>
			          </td>
          		</tr>
          	</table>
          </td>
	      </tr><!-- end tr -->
				<tr>
          <td valign="middle" class="hero hero-2 bg_white" style="padding: 1em 0;">
            <div class="text" style="text-align: center;">
                <h2>Invoice Pendaftaran</h2>
            </div>
          </td>
        </tr><!-- end tr -->
	      <tr>
		      <td class="bg_white">
		        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
		          <tr>
		            <td class="bg_white email-section">
                  <div class="heading-section" style="text-align: center; padding: 0 30px;">
                    <p style="color: #000; text-align: justify;">
                      Hai <b>{{ $data['firstname'] }}</b>! Terima kasih kamu telah memilih divisi <b>{{ $data['divisi'] }}</b>. Tinggal satu langkah lagi! kamu perlu melunasi biaya pendaftaran sebesar <b>{{ $data['amount'] }}</b>
                      dengan melakukan <b>transfer ke salah satu rekening</b> berikut:<br><br>
                        @foreach ($data['payments'] as $method)
                            - {{ $method }} <br>
                        @endforeach
                      <br>Segera setelah kamu selesai transfer, kamu perlu melakukan <b>konfirmasi pembayaran</b>
                      dengan mengirimkan bukti transfer, bisa <b>berupa foto atau screenshot</b>. Kamu bisa melakukannya
                      lewat tombol konfirmasi dibawah ini, yang akan mengarahkan kamu ke <b>chat WhatsApp</b>.
                    </p>
                    <br>
                    <a href="{{ $data['link_konfirmasi'] }}" target="_blank" rel="noreferrer noopener" class="btn btn-primary">Chat Konfirmasi Pembayaran</a>
                    <br/><br/>
                  </div>
		            </td>
		          </tr><!-- end: tr -->
		        </table>
		      </td>
		    </tr><!-- end:tr -->
      <!-- 1 Column Text + Button : END -->
      </table>

      <div style="padding: 40px; background: #0799da; color: #fff;">
        <h3 class="heading" style="font-size: 24px; color: #fff;">Explore AMCC</h3>
        <a href="https://amcc.or.id" target="_blank" style="padding: 12px;">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26 26" width="48" height="48">
            <g>
              <path style="fill:#fff;" d="M8.083,11.222L6.419,15c-0.041,0.094-0.144,0.154-0.257,0.154H5.31
                c-0.113,0-0.216-0.061-0.256-0.154l-0.79-1.803c-0.077-0.178-0.147-0.348-0.213-0.517c-0.073,0.186-0.148,0.359-0.223,0.525
                l-0.833,1.8c-0.042,0.091-0.144,0.149-0.255,0.149H1.888c-0.117,0-0.219-0.063-0.259-0.158l-1.557-3.779
                c-0.03-0.074-0.018-0.156,0.034-0.221s0.135-0.103,0.225-0.103H1.29c0.121,0,0.227,0.069,0.263,0.169l0.684,1.92
                c0.057,0.162,0.11,0.315,0.159,0.461c0.06-0.146,0.125-0.3,0.194-0.463l0.842-1.932c0.041-0.093,0.143-0.155,0.256-0.155H4.48
                c0.115,0,0.217,0.063,0.258,0.157l0.798,1.89c0.072,0.17,0.136,0.329,0.195,0.479c0.049-0.142,0.106-0.296,0.171-0.465l0.737-1.898
                c0.038-0.098,0.143-0.164,0.26-0.164h0.926c0.091,0,0.175,0.039,0.227,0.104C8.105,11.064,8.115,11.147,8.083,11.222z
                M17.005,11.222L15.341,15c-0.041,0.094-0.144,0.154-0.256,0.154h-0.854c-0.113,0-0.215-0.061-0.256-0.154l-0.789-1.803
                c-0.078-0.178-0.148-0.348-0.214-0.517c-0.073,0.186-0.148,0.359-0.223,0.525l-0.833,1.8c-0.042,0.091-0.143,0.149-0.255,0.149
                h-0.853c-0.116,0-0.219-0.063-0.259-0.158l-1.557-3.779c-0.03-0.074-0.018-0.156,0.034-0.221c0.052-0.064,0.136-0.103,0.225-0.103
                h0.959c0.121,0,0.227,0.069,0.263,0.169l0.683,1.92c0.057,0.162,0.11,0.315,0.161,0.461c0.059-0.146,0.123-0.3,0.192-0.463
                l0.843-1.932c0.04-0.093,0.142-0.155,0.256-0.155H13.4c0.115,0,0.218,0.063,0.258,0.157l0.799,1.89
                c0.071,0.17,0.135,0.329,0.193,0.479c0.051-0.142,0.106-0.296,0.172-0.465l0.737-1.898c0.038-0.098,0.144-0.164,0.261-0.164h0.926
                c0.092,0,0.177,0.039,0.227,0.104C17.026,11.064,17.038,11.147,17.005,11.222z M25.926,11.222L24.263,15
                c-0.042,0.094-0.144,0.154-0.257,0.154h-0.853c-0.113,0-0.216-0.061-0.256-0.154l-0.789-1.803
                c-0.078-0.178-0.148-0.348-0.214-0.517c-0.073,0.186-0.149,0.359-0.224,0.525l-0.833,1.8c-0.042,0.091-0.144,0.149-0.255,0.149
                H19.73c-0.117,0-0.22-0.063-0.26-0.158l-1.557-3.779c-0.029-0.074-0.019-0.156,0.033-0.221s0.136-0.103,0.226-0.103h0.96
                c0.121,0,0.227,0.069,0.262,0.169l0.684,1.92c0.057,0.162,0.11,0.315,0.16,0.461c0.059-0.146,0.123-0.3,0.192-0.463l0.843-1.932
                c0.041-0.093,0.143-0.155,0.257-0.155h0.791c0.115,0,0.218,0.063,0.258,0.157l0.798,1.89c0.072,0.17,0.137,0.329,0.196,0.479
                c0.049-0.142,0.106-0.296,0.171-0.465l0.738-1.898c0.037-0.098,0.142-0.164,0.26-0.164h0.926c0.092,0,0.176,0.039,0.227,0.104
                C25.946,11.064,25.958,11.147,25.926,11.222z"/>
              <g>
                <path style="fill:#fff;" d="M2.71,9c0.283-0.718,0.637-1.401,1.057-2.037C3.829,6.975,3.887,7,3.952,7h1.88
                  c-0.199,0.634-0.355,1.309-0.49,2h2.055c0.155-0.699,0.335-1.376,0.562-2h9.986c0.227,0.624,0.407,1.301,0.562,2h2.055
                  c-0.135-0.691-0.291-1.366-0.49-2h1.88c0.065,0,0.123-0.025,0.186-0.037C22.556,7.599,22.911,8.282,23.194,9h2.121
                  c-1.691-5.216-6.591-9-12.363-9S2.28,3.784,0.588,9H2.71z M20.478,5H19.29c-0.258-0.543-0.542-1.05-0.851-1.519
                  C19.179,3.909,19.861,4.419,20.478,5z M12.952,2c1.551,0,2.983,1.154,4.062,3H8.89C9.969,3.154,11.401,2,12.952,2z M7.463,3.481
                  C7.155,3.95,6.871,4.457,6.613,5H5.426C6.043,4.419,6.725,3.909,7.463,3.481z"/>
                <path style="fill:#fff;" d="M23.194,17c-0.283,0.719-0.638,1.4-1.057,2.037C22.075,19.025,22.017,19,21.952,19h-1.881
                  c0.199-0.634,0.355-1.309,0.49-2h-2.055c-0.154,0.699-0.335,1.377-0.562,2H7.959c-0.227-0.623-0.407-1.301-0.562-2H5.343
                  c0.135,0.691,0.291,1.366,0.49,2H3.952c-0.065,0-0.123,0.025-0.185,0.037C3.348,18.4,2.993,17.719,2.71,17H0.588
                  c1.692,5.216,6.592,9,12.364,9s10.672-3.784,12.363-9H23.194z M5.426,21h1.188c0.258,0.543,0.542,1.051,0.85,1.519
                  C6.725,22.091,6.043,21.581,5.426,21z M12.952,24c-1.551,0-2.983-1.154-4.062-3h8.123C15.935,22.846,14.503,24,12.952,24z
                  M18.44,22.519c0.309-0.468,0.593-0.976,0.851-1.519h1.188C19.861,21.581,19.179,22.091,18.44,22.519z"/>
              </g>
            </g>
          </svg>
        </a>
        <a href="https://instagram.com/amccamikom" target="_blank" style="padding: 12px;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="48" height="48">
            <path
              style="fill:#fff"
              d="M256,49.471c67.266,0,75.233.257,101.8,1.469,24.562,1.121,37.9,5.224,46.778,8.674a78.052,78.052,0,0,1,28.966,18.845,78.052,78.052,0,0,1,18.845,28.966c3.45,8.877,7.554,22.216,8.674,46.778,1.212,26.565,1.469,34.532,1.469,101.8s-0.257,75.233-1.469,101.8c-1.121,24.562-5.225,37.9-8.674,46.778a83.427,83.427,0,0,1-47.811,47.811c-8.877,3.45-22.216,7.554-46.778,8.674-26.56,1.212-34.527,1.469-101.8,1.469s-75.237-.257-101.8-1.469c-24.562-1.121-37.9-5.225-46.778-8.674a78.051,78.051,0,0,1-28.966-18.845,78.053,78.053,0,0,1-18.845-28.966c-3.45-8.877-7.554-22.216-8.674-46.778-1.212-26.564-1.469-34.532-1.469-101.8s0.257-75.233,1.469-101.8c1.121-24.562,5.224-37.9,8.674-46.778A78.052,78.052,0,0,1,78.458,78.458a78.053,78.053,0,0,1,28.966-18.845c8.877-3.45,22.216-7.554,46.778-8.674,26.565-1.212,34.532-1.469,101.8-1.469m0-45.391c-68.418,0-77,.29-103.866,1.516-26.815,1.224-45.127,5.482-61.151,11.71a123.488,123.488,0,0,0-44.62,29.057A123.488,123.488,0,0,0,17.3,90.982C11.077,107.007,6.819,125.319,5.6,152.134,4.369,179,4.079,187.582,4.079,256S4.369,333,5.6,359.866c1.224,26.815,5.482,45.127,11.71,61.151a123.489,123.489,0,0,0,29.057,44.62,123.486,123.486,0,0,0,44.62,29.057c16.025,6.228,34.337,10.486,61.151,11.71,26.87,1.226,35.449,1.516,103.866,1.516s77-.29,103.866-1.516c26.815-1.224,45.127-5.482,61.151-11.71a128.817,128.817,0,0,0,73.677-73.677c6.228-16.025,10.486-34.337,11.71-61.151,1.226-26.87,1.516-35.449,1.516-103.866s-0.29-77-1.516-103.866c-1.224-26.815-5.482-45.127-11.71-61.151a123.486,123.486,0,0,0-29.057-44.62A123.487,123.487,0,0,0,421.018,17.3C404.993,11.077,386.681,6.819,359.866,5.6,333,4.369,324.418,4.079,256,4.079h0Z"/>
            <path
              style="fill:#fff"
              d="M256,126.635A129.365,129.365,0,1,0,385.365,256,129.365,129.365,0,0,0,256,126.635Zm0,213.338A83.973,83.973,0,1,1,339.974,256,83.974,83.974,0,0,1,256,339.973Z"/>
            <circle
              style="fill:#fff"
              cx="390.476" cy="121.524" r="30.23"/>
          </svg>
        </a>
      </div>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="middle" class="bg_black footer email-section">
            <table>
            	<tr>
                <td valign="top" width="50%">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                      	<h3 class="heading" style="font-size: 18px;">Sekretariat</h3>
                      	<p>
                          Gedung BSC Lt. 3<br/>
                          Universitas Amikom Yogyakarta<br/>
                          Jalan Ringroad Utara, Condongcatur, Depok<br/>
                          Sleman, Yogyakarta
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="50%">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                      	<h3 class="heading" style="font-size: 18px;">Basecamp</h3>
                      	<p>
                          Jalan Persatuan Condongcatur 83 RT 04 RW 12<br/>
                          Karang Asem, Condongcatur, Depok<br/>
                          Sleman, Yogyakarta
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end: tr -->
        <tr>
        	<td valign="middle" class="bg_black footer email-section">
        		<table>
            	<tr>
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                  <tr>
                    <td style="text-align: left; padding-right: 10px; text-align: center;">
                    	<p>
                        &copy; 2020 Amikom Computer Club. All Rights Reserved.<br/>
                      </p>
                    </td>
                  </tr>
                </table>
              </tr>
            </table>
        	</td>
        </tr>
      </table>
    </div>
  </center>
</body>
</html>
