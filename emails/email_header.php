<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->


    <!-- CSS Reset -->
    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What is does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        table table table {
            table-layout: auto;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* What it does: A work-around for iOS meddling in triggered links. */
        .mobile-link--footer a,
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: underline !important;
        }
    </style>

    <!-- Progressive Enhancements -->
    <style>
        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }

        .button-td:hover,
        .button-a:hover {
            background: #005d9a !important;
            border-color: #005d9a !important;
        }

        table.cpmdt_email_table {
            width: 100%;
        }

        table.cpmdt_email_table td {
            border: solid 1px;
        }

        table.cpmdt_email_table tr {
            padding: 5px;
        }
    </style>

</head>

<body width="100%" bgcolor="#f5f5f5" style="margin: 0;">
    <center style="width: 100%; background: #f5f5f5;">

        <!-- Visually Hidden Preheader Text : BEGIN -->
        <!--         <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
            (Optional) This text will appear in the inbox preview, but not the email body.
        </div> -->
        <!-- Visually Hidden Preheader Text : END -->

        <!--
            Set the email width. Defined in two places:
            1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
            2. MSO tags for Desktop Windows Outlook enforce a 600px width.
        -->
        <div style="max-width: 600px; margin: auto;">
            <!--[if mso]>
            <table cellspacing="0" cellpadding="0" border="0" width="600" align="center">
            <tr>
            <td>
            <![endif]-->

            <!-- Email Header : BEGIN -->
            <!--             <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;" role="presentation">
				<tr>
					<td style="padding: 20px 0; text-align: center">
						<img src="http://placehold.it/200x50" width="200" height="50" alt="alt_text" border="0">
					</td>
				</tr>
            </table> -->
            <!-- Email Header : END -->

            <!-- Clear Spacer : BEGIN -->
            <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;" role="presentation">
                <tr>
                    <td height="20" style="font-size: 0; line-height: 0;">
                        &nbsp;
                    </td>
                </tr>
            </table>
            <!-- Clear Spacer : END -->

            <!-- Email Body : BEGIN -->
            <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;" role="presentation">

                <!-- Hero Image, Flush : BEGIN -->
                <tr>
                    <td bgcolor="#ffffff" align="center">

                        <a href="https://etm.ch/" target="_blank"><img src="https://etm.ch/wp-content/themes/etm_2018/img/ewa-email-header.png" width="100%" height="" border="0" align="left" style="width: 100%; max-width:600px; margin-bottom: 15px;">
                        </a>
                    </td>
                </tr>
                <!-- Hero Image, Flush : END -->
                <tr>
                    <td bgcolor="#ffffff">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">