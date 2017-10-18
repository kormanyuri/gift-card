<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>

    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script src="/stripe/index.js?v=1.0"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        blockquote,
        body,
        button,
        dd,
        dl,
        figure,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        ol,
        p,
        pre,
        ul {
            margin: 0;
            padding: 0;
        }

        ol,
        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        button,
        select {
            border: none;
            outline: none;
            background: none;
            font-family: inherit;
        }

        a,
        button,
        input,
        select,
        textarea {
            -webkit-tap-highlight-color: transparent;
        }

        :root {
            overflow-x: hidden;
            height: 100%;
        }

        body {
            background: #fff;
            min-height: 100%;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            font-size: 62.5%;
            font-family: Roboto, Open Sans, Segoe UI, sans-serif;
            font-weight: 400;
            font-style: normal;
            -webkit-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
            font-feature-settings: "pnum";
            font-variant-numeric: proportional-nums;
        }

        .globalContent {
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        @font-face {
            font-family: StripeIcons;
            src: url(data:application/octet-stream;base64,d09GRk9UVE8AAAZUAAoAAAAAB6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABDRkYgAAADKAAAAx8AAAOKkWuAp0dTVUIAAAZIAAAACgAAAAoAAQAAT1MvMgAAAXAAAABJAAAAYGcdjVZjbWFwAAACvAAAAFYAAACUKEhKfWhlYWQAAAD8AAAAMAAAADYJAklYaGhlYQAAAVAAAAAgAAAAJAYoAa5obXR4AAABLAAAACQAAAAoEOAAWW1heHAAAAD0AAAABgAAAAYAClAAbmFtZQAAAbwAAAD%2FAAABuXejDuxwb3N0AAADFAAAABMAAAAg%2F7gAMgAAUAAACgAAeNpjYGRgYABifeaSpHh%2Bm68MzMwHgCIMl08yqyDo%2F95Mkcy8QC4zAxNIFAD8tAiweNpjfMAQyfiAgYEpgoGBcQmQlmFgYPgAZOtAcQZEDgCHaQVGeNpjYGRgYD7z34eBgSmCgeH%2Ff6ZIBqAICuACAHpYBNp42mNgZtzAOIGBlYGDqYDJgYGBwQNCMwYwGDEcA%2FKBUthBqHe4H4MDg4L6Imae%2Fz4MB5jPMGwBCjOC5Bi9mKYAKQUGBgAFHgteAAAAeNplkMFqwkAURU9itBVKF6XLLrLsxiGKMYH0B4IgoqjdRokajAmNUfolhX5Df7IvZhBt5zHMeffduQwDPPCFQbWM81mzyZ3uocEz95qtK0%2BTN140t2jzLk7DaotiEmk2eWSlucErH5otnvjW3OSTH82tSg8n8eaYRkVXOY4TzIaLURB2tDaPi0OSZ3Y9G09tx6lxm5erPDtVA%2BX7wT7axXm5Vmmy7ClXDfqe515CCJkQs%2BFIKk8t6KJwzhUwY8iCkVBI54%2FvvzKXruBAQk6GfZM0ZipKxdfqVpylfErlP11uKHypgL2k7iSz8qxFTSV5SU%2FIlT2gjyfl%2FgKN9EDsAHjaY2BgYGaA4DAGRgYQkAHyGMF8NgYrIM3JIAHEEACj8QNOBhYGOyDNAYRMQFpBcZL6ov%2F%2Foaw5%2F%2F%2F%2Ff3kvH8iD2McCxExAO1kYWIE2cjCwAwAgUQwvAAB42mNgZgCD%2F1sZjBiwAAAswgHqAHjaNVFbbxNHGN2JMmtlNnIoZFFx1F2nDoTWgJLIhRQqWlRowyXiUkqE1IZLVW0dJzHYjpAhxnbYi8HXdWxsEKCIi0DdqjxVyhOKkBBS%2FdAX%2FkJfmiCe0Gz4orbjLNFo5uj79B19Z85BXGsLhxAiB7ef%2BFmZGj8XaVb9dgdn%2B5Dd02J%2F2JqFIXtpeQ5Lc6h1YzKbXcN2F%2F2qg373wZ3ly%2Bs5gpCwfpO3d8dnXwyfOheJhC9FgsovsanJ4MCuzw84sN%2BBb1Zh34ADfU7za6fq%2Fyl8Ib7K9E4Eo9HgpHLQu6aL45CB8ug6yqAbKIeyqMAhjjD1nM49596hbqQgHf2B%2Fm5xt3S8sqXlORFe%2FHuSvuD3vesUQ4eVxjgEfm08PWK5%2FoF14lBjDAJvXI0xMRS0%2BMVjbGLIbzV%2BP2y5aOC46IfAb7TzT5cFbSJwEKCc9eXifGgqtOBahN3vWy7aOS76f1zkrVNiaNw1NIpfhyBg8X%2FN428t3v2KJl6KtVqxWpXpCD2Bq5XZW3XPrWv1dMVHEmZy9pr8dhsGdQuhKt%2FTh9Mz6nTCE34Yeyy56byfUHMzqaWrEpRpHldmrpqJrosXPyV0N%2BzAsMJYKzwMwjacTmtXGe9%2B7InkrtPz3aRoaIWPSUEtGjL1wUcYFnoJXeChG7qwpmfUHkI30XsvRdMsmKZMs9TwEsjR67ik6%2Fk14hk4jVcGe4k9yMMojGDNyKiqRy1opi5phUrG7HLDnkfdxOHktZIu072wB9jFhpHReoj3UXNF3lmReb%2FC0eaMx%2BESO1NY1w2myfuMuXW7VKvJ9CQ9im9Wy3XmllpLVX0kWUzNpmW6E%2FrY8ePkjLaV%2FPCMWVTeTJidTYtyuJpuWhSOMYsuwBhMgNK0dCtxS3O7%2Fmtvy7YL9lKn7RfvbODaEerw%2BXfuPfT92WDkiopLpaJZ9pQNUy9JAlNdyjVVH6PDTDV7saB2TadSCVWQYIQeZ2F8QgTVM30zdZtFlcOVSmU1WYFXolFFeRB9Kgt8PJmMx2vJu7IwvZoOS9XRFwsLsXCylKjMyGxXrV5kXxb%2BBxsddR0AAAEAAAAAAAAAAAAA)
            format("woff");
        }

        .container,
        .container-fluid,
        .container-lg,
        .container-wide,
        .container-xl {
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        .container,
        .container-lg {
            max-width: 1040px;
        }

        .container-wide,
        .container-xl {
            max-width: 1160px;
        }

        .common-SuperTitle {
            font-weight: 300;
            font-size: 45px;
            line-height: 60px;
            color: #32325d;
            letter-spacing: -.01em;
        }

        @media (min-width: 670px) {
            .common-SuperTitle {
                font-size: 50px;
                line-height: 70px;
            }
        }

        .common-IntroText {
            font-weight: 400;
            font-size: 21px;
            line-height: 31px;
            color: #525f7f;
        }

        @media (min-width: 670px) {
            .common-IntroText {
                font-size: 24px;
                line-height: 36px;
            }
        }

        .common-BodyText {
            font-weight: 400;
            font-size: 17px;
            line-height: 26px;
            color: #6b7c93;
        }

        .common-Link {
            color: #6772e5;
            font-weight: 500;
            transition: color 0.1s ease;
            cursor: pointer;
        }

        .common-Link:hover {
            color: #32325d;
        }

        .common-Link:active {
            color: #000;
        }

        .common-Link--arrow:after {
            font: normal 16px StripeIcons;
            content: "\2192";
            padding-left: 5px;
        }

        .common-Button {
            white-space: nowrap;
            display: inline-block;
            height: 40px;
            line-height: 40px;
            padding: 0 14px;
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            background: #fff;
            border-radius: 4px;
            font-size: 15px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            color: #6772e5;
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .common-Button:hover {
            color: #7795f8;
            transform: translateY(-1px);
            box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        }

        .common-Button:active {
            color: #555abf;
            background-color: #f6f9fc;
            transform: translateY(1px);
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .common-Button--default {
            color: #fff;
            background: #6772e5;
        }

        .common-Button--default:hover {
            color: #fff;
            background-color: #7795f8;
        }

        .common-Button--default:active {
            color: #e6ebf1;
            background-color: #555abf;
        }

        .common-Button--dark {
            color: #fff;
            background: #32325d;
        }

        .common-Button--dark:hover {
            color: #fff;
            background-color: #43458b;
        }

        .common-Button--dark:active {
            color: #e6ebf1;
            background-color: #32325d;
        }

        .common-Button--disabled {
            color: #fff;
            background: #aab7c4;
            pointer-events: none;
        }

        .common-ButtonIcon {
            display: inline;
            margin: 0 5px 0 0;
            position: relative;
        }

        .common-ButtonGroup {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: -10px;
        }

        .common-ButtonGroup .common-Button {
            -ms-flex-negative: 0;
            flex-shrink: 0;
            margin: 10px;
        }

        /** Page-specific styles */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(1turn);
            }
        }

        @keyframes void-animation-out {
            0%,
            to {
                opacity: 1;
            }
        }

        body {
            overflow-x: hidden;
            background-color: #f6f9fc;
        }

        main {
            position: relative;
            display: block;
            z-index: 1;
        }

        .stripes {
            position: absolute;
            width: 100%;
            transform: skewY(-12deg);
            height: 950px;
            top: -350px;
            background: linear-gradient(180deg, #e6ebf1 350px, rgba(230, 235, 241, 0));
        }

        .stripes .stripe {
            position: absolute;
            height: 190px;
        }

        .stripes .s1 {
            height: 380px;
            top: 0;
            left: 0;
            width: 24%;
            background: linear-gradient(90deg, #e6ebf1, rgba(230, 235, 241, 0));
        }

        .stripes .s2 {
            top: 380px;
            left: 4%;
            width: 35%;
            background: linear-gradient(
                    90deg,
                    hsla(0, 0%, 100%, 0.65),
                    hsla(0, 0%, 100%, 0)
            );
        }

        .stripes .s3 {
            top: 380px;
            right: 0;
            width: 38%;
            background: linear-gradient(90deg, #e4e9f0, rgba(228, 233, 240, 0));
        }

        main > .container-lg {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            position: relative;
            max-width: 750px;
            padding: 110px 20px 110px;
        }

        main > .container-lg .cell {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            position: relative;
            -ms-flex: 1 0 calc(50% - 80px);
            flex: 1 0 calc(50% - 80px);
            min-width: 100%;
            min-height: 500px;
            padding: 0 40px;
        }

        main > .container-lg .cell + .cell {
            margin-top: 70px;
        }

        main > .container-lg .cell.intro {
            padding: 0;
        }

        @media (min-width: 670px) {
            main > .container-lg .cell.intro {
                -ms-flex-align: center;
                align-items: center;
                text-align: center;
            }
        }

        main > .container-lg .cell.intro > * {
            width: 100%;
            max-width: 700px;
        }

        main > .container-lg .cell.intro .common-IntroText {
            margin-top: 10px;
        }

        main > .container-lg .cell.intro .common-BodyText {
            margin-top: 15px;
        }

        main > .container-lg .cell.intro .common-ButtonGroup {
            width: auto;
            margin-top: 20px;
        }

        main > .container-lg .example {
            -ms-flex-align: center;
            align-items: center;
            border-radius: 4px;
            box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
            padding: 80px 10px;
            margin-left: -10px;
            margin-right: -10px;
        }

        @media (min-width: 670px) {
            main > .container-lg .example {
                padding: 40px;
            }
        }

        main > .container-lg .example.submitted form,
        main > .container-lg .example.submitting form {
            opacity: 0;
            transform: scale(0.9);
            pointer-events: none;
        }

        main > .container-lg .example.submitted .success,
        main > .container-lg .example.submitting .success {
            pointer-events: all;
        }

        main > .container-lg .example.submitting .success .icon {
            opacity: 1;
        }

        main > .container-lg .example.submitted .success > * {
            opacity: 1;
            transform: none !important;
        }

        main > .container-lg .example.submitted .success > :nth-child(2) {
            transition-delay: 0.1s;
        }

        main > .container-lg .example.submitted .success > :nth-child(3) {
            transition-delay: 0.2s;
        }

        main > .container-lg .example.submitted .success > :nth-child(4) {
            transition-delay: 0.3s;
        }

        main > .container-lg .example.submitted .success .icon .border,
        main > .container-lg .example.submitted .success .icon .checkmark {
            opacity: 1;
            stroke-dashoffset: 0 !important;
        }

        main > .container-lg .example * {
            margin: 0;
            padding: 0;
        }

        main > .container-lg .example .caption {
            display: flex;
            justify-content: space-between;
            position: absolute;
            width: 100%;
            top: 100%;
            left: 0;
            padding: 15px 10px 0;
            color: #aab7c4;
            font-family: Roboto, "Open Sans", "Segoe UI", sans-serif;
            font-size: 15px;
            font-weight: 500;
        }

        main > .container-lg .example .caption * {
            font-family: inherit;
            font-size: inherit;
            font-weight: inherit;
        }

        main > .container-lg .example .caption .no-charge {
            color: #cfd7df;
            margin-right: 10px;
        }

        main > .container-lg .example .caption a.source {
            text-align: right;
            color: inherit;
            transition: color 0.1s ease-in-out;
            margin-left: 10px;
        }

        main > .container-lg .example .caption a.source:hover {
            color: #6772e5;
        }

        main > .container-lg .example .caption a.source:active {
            color: #43458b;
        }

        main > .container-lg .example .caption a.source  svg {
            margin-right: 10px;
        }

        main > .container-lg .example .caption a.source svg path {
            fill: currentColor;
        }

        main > .container-lg .example form {
            position: relative;
            width: 100%;
            max-width: 500px;
            transition-property: opacity, transform;
            transition-duration: 0.35s;
            transition-timing-function: cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        main > .container-lg .example form input::-webkit-input-placeholder {
            opacity: 1;
        }

        main > .container-lg .example form input::-moz-placeholder {
            opacity: 1;
        }

        main > .container-lg .example form input:-ms-input-placeholder {
            opacity: 1;
        }

        main > .container-lg .example .error {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: center;
            justify-content: center;
            position: absolute;
            width: 100%;
            top: 100%;
            margin-top: 20px;
            left: 0;
            padding: 0 15px;
            font-size: 13px !important;
            opacity: 0;
            transform: translateY(10px);
            transition-property: opacity, transform;
            transition-duration: 0.35s;
            transition-timing-function: cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        main > .container-lg .example .error.visible {
            opacity: 1;
            transform: none;
        }

        main > .container-lg .example .error .message {
            font-size: inherit;
        }

        main > .container-lg .example .error svg {
            -ms-flex-negative: 0;
            flex-shrink: 0;
            margin-top: -1px;
            margin-right: 10px;
        }

        main > .container-lg .example .success {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: center;
            justify-content: center;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            padding: 10px;
            text-align: center;
            pointer-events: none;
            overflow: hidden;
        }

        @media (min-width: 670px) {
            main > .container-lg .example .success {
                padding: 40px;
            }
        }

        main > .container-lg .example .success > * {
            transition-property: opacity, transform;
            transition-duration: 0.35s;
            transition-timing-function: cubic-bezier(0.165, 0.84, 0.44, 1);
            opacity: 0;
            transform: translateY(50px);
        }

        main > .container-lg .example .success .icon {
            margin: 15px 0 30px;
            transform: translateY(70px) scale(0.75);
        }

        main > .container-lg .example .success .icon svg {
            will-change: transform;
        }

        main > .container-lg .example .success .icon .border {
            stroke-dasharray: 251;
            stroke-dashoffset: 62.75;
            transform-origin: 50% 50%;
            transition: stroke-dashoffset 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            animation: spin 1s linear infinite;
        }

        main > .container-lg .example .success .icon .checkmark {
            stroke-dasharray: 60;
            stroke-dashoffset: 60;
            transition: stroke-dashoffset 0.35s cubic-bezier(0.165, 0.84, 0.44, 1) 0.35s;
        }

        main > .container-lg .example .success .title {
            font-size: 17px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        main > .container-lg .example .success .message {
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 25px;
            line-height: 1.6em;
        }

        main > .container-lg .example .success .message span {
            font-size: inherit;
        }

        main > .container-lg .example .success .reset:active {
            transition-duration: 0.15s;
            transition-delay: 0s;
            opacity: 0.65;
        }

        main > .container-lg .example .success .reset svg {
            will-change: transform;
        }
    </style>
    <style>
        .example.example5 {
            background-color: #9169d8;
        }

        .example.example5 * {
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 15px;
            font-weight: 400;
        }

        .example.example5 form {
        }

        #example5-paymentRequest {
            max-width: 500px;
            width: 100%;
            margin-bottom: 10px;
        }

        .example.example5 fieldset {
            border: 1px solid #b5a4ed;
            padding: 15px;
            border-radius: 6px;
        }

        .example.example5 fieldset legend {
            margin: 0 auto;
            padding: 0 10px;
            text-align: center;
            font-size: 14px;
            font-weight: 500;
            color: #cdd0f8;
            background-color: #9169d8;
        }

        .example.example5 fieldset legend + * {
            clear: both;
        }

        .example.example5 .card-only {
            display: block;
        }
        .example.example5 .payment-request-available {
            display: none;
        }

        .example.example5 .row {
            display: -ms-flexbox;
            display: flex;
            margin: 0 0 10px;
        }

        .example.example5 .field {
            position: relative;
            width: 100%;
        }

        .example.example5 .field + .field {
            margin-left: 10px;
        }

        .example.example5 label {
            width: 100%;
            color: #cdd0f8;
            font-size: 13px;
            font-weight: 500;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .example.example5 .input {
            width: 100%;
            color: #fff;
            background: transparent;
            padding: 5px 0 6px 0;
            border-bottom: 1px solid #a988ec;
            transition: border-color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .example.example5 .input::-webkit-input-placeholder {
            color: #bfaef6;
        }

        .example.example5 .input::-moz-placeholder {
            color: #bfaef6;
        }

        .example.example5 .input:-ms-input-placeholder {
            color: #bfaef6;
        }

        .example.example5 .input.StripeElement--focus,
        .example.example5 .input:focus {
            border-color: #fff;
        }
        .example.example5 .input.StripeElement--invalid {
            border-color: #ffc7ee;
        }

        .example.example5 input:-webkit-autofill,
        .example.example5 select:-webkit-autofill {
            -webkit-text-fill-color: #fce883;
            transition: background-color 100000000s;
            -webkit-animation: 1ms void-animation-out;
        }

        .example.example5 .StripeElement--webkit-autofill {
            background: transparent !important;
        }

        .example.example5 input,
        .example.example5 select {
            -webkit-animation: 1ms void-animation-out;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
            border-style: none;
            border-radius: 0;
        }

        .example.example5 select.input,
        .example.example5 select:-webkit-autofill {
            background-image: url('data:image/svg+xml;utf8,<svg width="10px" height="5px" viewBox="0 0 10 5" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#fff" d="M5.35355339,4.64644661 L9.14644661,0.853553391 L9.14644661,0.853553391 C9.34170876,0.658291245 9.34170876,0.341708755 9.14644661,0.146446609 C9.05267842,0.0526784202 8.92550146,-2.43597394e-17 8.79289322,0 L1.20710678,0 L1.20710678,0 C0.930964406,5.07265313e-17 0.707106781,0.223857625 0.707106781,0.5 C0.707106781,0.632608245 0.759785201,0.759785201 0.853553391,0.853553391 L4.64644661,4.64644661 L4.64644661,4.64644661 C4.84170876,4.84170876 5.15829124,4.84170876 5.35355339,4.64644661 Z" id="shape"></path></svg>');
            background-position: 100%;
            background-size: 10px 5px;
            background-repeat: no-repeat;
            overflow: hidden;
            text-overflow: ellipsis;
            padding-right: 20px;
        }

        .example.example5 input[type="submit"] {
            display: block;
            width: 100%;
            height: 40px;
            margin: 20px 0 0;
            background-color: #fff;
            border-radius: 6px;
            color: #9169d8;
            font-weight: 500;
            cursor: pointer;
        }

        .example.example5 input[type="submit"]:active {
            background-color: #cdd0f8;
        }

        .example.example5 .error svg .base {
            fill: #fff;
        }

        .example.example5 .error svg .glyph {
            fill: #9169d8;
        }

        .example.example5 .error .message {
            color: #fff;
        }

        .example.example5 .success .icon .border {
            stroke: #bfaef6;
        }

        .example.example5 .success .icon .checkmark {
            stroke: #fff;
        }

        .example.example5 .success .title {
            color: #fff;
        }

        .example.example5 .success .message {
            color: #cdd0f8;
        }

        .example.example5 .success .reset path {
            fill: #fff;
        }
    </style>


</head>
<body>

<div class="cell example example5" style="width: 50%; margin: 0 auto">
    <form action="https://drizzle.jjpanda.com/backend/gift-card/charge" method="post">
        <div id="example5-paymentRequest">
            <!--Stripe payment request API element inserted here-->
        </div>
        <fieldset>
            <legend class="card-only">Pay with card</legend>
            <legend class="payment-request-available">Or enter card details</legend>
            <div class="row">
                <div class="field">
                    <label for="example5-name">Name</label>
                    <input id="example5-name" class="input" type="text" placeholder="Jane Doe" required="">
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <label for="example5-email">Email</label>
                    <input id="example5-email" class="input" type="text" placeholder="janedoe@gmail.com" required="">
                </div>
                <div class="field">
                    <label for="example5-phone">Phone</label>
                    <input id="example5-phone" class="input" type="text" placeholder="(941) 555-0123" required="">
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <label for="example5-address">Address</label>
                    <input id="example5-address" class="input" type="text" placeholder="185 Berry St" required="">
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <label for="example5-city">City</label>
                    <input id="example5-city" class="input" type="text" placeholder="Vancouver" required="">
                </div>
                <div class="field">
                    <label for="example5-country">Country</label>
                    <select id="example5-country" class="input">
                        <option selected="selected" value="CA">Canada</option>
                        <option value="US">United States</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <label for="example5-card">Card</label>
                    <div id="example5-card" class="input"></div>
                </div>
            </div>
            <input type="submit" value="Pay">
        </fieldset>
        <div class="error" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
                <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
            </svg>
            <span class="message"></span>
        </div>
    </form>
</div>

<script type="text/javascript">
    (function() {
        'use strict';

        var elements = stripe.elements();

        /**
         * Card Element
         */
        var card = elements.create('card', {
            style: {
                iconStyle: 'solid',
                base: {
                    iconColor: '#fff',
                    color: '#fff',
                    fontWeight: 400,
                    fontFamily: 'Helvetica Neue, Helvetica, Arial, sans-serif',
                    fontSize: '15px',
                    fontSmoothing: 'antialiased',

                    '::placeholder': {
                        color: '#BFAEF6',
                    },
                    ':-webkit-autofill': {
                        color: '#fce883',
                    },
                },
                invalid: {
                    iconColor: '#FFC7EE',
                    color: '#FFC7EE',
                },
            },
        });
        card.mount('#example5-card');

        /**
         * Payment Request Element
         */
        var paymentRequest = stripe.paymentRequest({
            country: 'US',
            currency: 'usd',
            total: {
                amount: 2500,
                label: 'Total',
            },
        });
        paymentRequest.on('token', function(result) {
            var example = document.querySelector('.example5');
            example.querySelector('.token').innerText = result.token.id;
            example.classList.add('submitted');
            result.complete('success');
        });

        var paymentRequestElement = elements.create('paymentRequestButton', {
            paymentRequest: paymentRequest,
            style: {
                paymentRequestButton: {
                    theme: 'light',
                },
            },
        });

        paymentRequest.canMakePayment().then(function(result) {
            if (result) {
                document.querySelector('.example5 .card-only').style.display = 'none';
                document.querySelector(
                    '.example5 .payment-request-available'
                ).style.display =
                    'block';
                paymentRequestElement.mount('#example5-paymentRequest');
            }
        });

        registerElements([card], 'example5');
    })();
</script>
</body>
</html>