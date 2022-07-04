@extends('_emails.template')

@section('header')
    <div class="u-row-container" style="padding: 0px;background-color: transparent">
        <div class="u-row"
            style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #031966;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                <div class="u-col u-col-100"
                    style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                    <div style="width: 100% !important;">
                        <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                cellspacing="0" width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                            align="left">

                                            <h1
                                                style="margin: 0px; color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: impact,chicago; font-size: 35px;">
                                                Welcome {{ $user->name ?? 'No Name' }}
                                            </h1>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="u-row-container" style="padding: 0px;background-color: transparent">
        <div class="u-row"
            style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                <div class="u-col u-col-100"
                    style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                    <div
                        style="background-color: #ffffff;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                        <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                cellspacing="0" width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:100px 30px;font-family:arial,helvetica,sans-serif;"
                                            align="left">

                                            <div
                                                style="color: #ffffff; line-height: 140%; text-align: left; word-wrap: break-word;">
                                                <p style="font-size: 14px; line-height: 140%;">
                                                    <span
                                                        style="font-family: impact, chicago; font-size: 24px; line-height: 33.6px; color: #050668;">
                                                        Thank You for Registering, your Voucher is:
                                                    </span>
                                                </p>
                                                <p style="font-size: 14px; line-height: 140%; text-align: center;">
                                                    <span style="font-size: 30px; line-height: 42px;">
                                                        <strong>
                                                            <span
                                                                style="font-family: impact, chicago; line-height: 42px; color: #016935; font-size: 30px;">
                                                                {{ $voucher->voucher ?? 'No Voucher' }}
                                                            </span>
                                                        </strong>
                                                    </span>
                                                </p>
                                            </div>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
