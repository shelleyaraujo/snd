<style>

@font-face {
	font-family: 'Red Hat Display';
	font-style: normal;
	font-weight: 400;
	src: url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-regular.eot'); /* IE9 Compat Modes */
	src: local('Red Hat Display'), local('RedHatDisplay-Regular'),
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-regular.woff2') format('woff2'), /* Super Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-regular.woff') format('woff'), /* Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-regular.ttf') format('truetype'), /* Safari, Android, iOS */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-regular.svg#RedHatDisplay') format('svg'); /* Legacy iOS */
}
@font-face {
	font-family: 'Red Hat Display';
	font-style: italic;
	font-weight: 400;
	src: url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-italic.eot'); /* IE9 Compat Modes */
	src: local('Red Hat Display It'), local('RedHatDisplay-Italic'),
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-italic.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-italic.woff2') format('woff2'), /* Super Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-italic.woff') format('woff'), /* Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-italic.ttf') format('truetype'), /* Safari, Android, iOS */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-italic.svg#RedHatDisplay') format('svg'); /* Legacy iOS */
}
@font-face {
	font-family: 'Red Hat Display';
	font-style: normal;
	font-weight: 500;
	src: url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500.eot'); /* IE9 Compat Modes */
	src: local('Red Hat Display Medium'), local('RedHatDisplay-Medium'),
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500.woff2') format('woff2'), /* Super Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500.woff') format('woff'), /* Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500.ttf') format('truetype'), /* Safari, Android, iOS */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500.svg#RedHatDisplay') format('svg'); /* Legacy iOS */
}
/* red-hat-display-500italic - latin */
@font-face {
	font-family: 'Red Hat Display';
	font-style: italic;
	font-weight: 500;
	src: url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500italic.eot'); /* IE9 Compat Modes */
	src: local('Red Hat Display Medium It'), local('RedHatDisplay-MediumItalic'),
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500italic.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500italic.woff2') format('woff2'), /* Super Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500italic.woff') format('woff'), /* Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500italic.ttf') format('truetype'), /* Safari, Android, iOS */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-500italic.svg#RedHatDisplay') format('svg'); /* Legacy iOS */
}
@font-face {
	font-family: 'Red Hat Display';
	font-style: normal;
	font-weight: 700;
	src: url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700.eot'); /* IE9 Compat Modes */
	src: local('Red Hat Display Bold'), local('RedHatDisplay-Bold'),
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700.woff2') format('woff2'), /* Super Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700.woff') format('woff'), /* Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700.ttf') format('truetype'), /* Safari, Android, iOS */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700.svg#RedHatDisplay') format('svg'); /* Legacy iOS */
}
@font-face {
	font-family: 'Red Hat Display';
	font-style: italic;
	font-weight: 700;
	src: url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700italic.eot'); /* IE9 Compat Modes */
	src: local('Red Hat Display Bold It'), local('RedHatDisplay-BoldItalic'),
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700italic.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700italic.woff2') format('woff2'), /* Super Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700italic.woff') format('woff'), /* Modern Browsers */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700italic.ttf') format('truetype'), /* Safari, Android, iOS */
	url('<?php echo myurl("app/views/tema_zentao/")?>fonts/red-hat-display-v1-latin-700italic.svg#RedHatDisplay') format('svg'); /* Legacy iOS */
}

/*
* Skeleton V2.0.4
* Copyright 2014, Dave Gamache
* www.getskeleton.com
* Free to use under the MIT license.
* http://www.opensource.org/licenses/mit-license.php
* 12/29/2014
*/


/* Table of contents
––––––––––––––––––––––––––––––––––––––––––––––––––
- Grid
- Base Styles
- Typography
- Links
- Buttons
- Forms
- Lists
- Code
- Tables
- Spacing
- Utilities
- Clearing
- Media Queries
*/


/* Grid
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.container {
  position: relative;
  width: 100%;
  max-width: 960px;
  margin: 0 auto;
  padding: 0 20px;
  box-sizing: border-box; }
  .column,
  .columns {
    width: 100%;
    float: left;
    box-sizing: border-box; }

    /* For devices larger than 400px */
    @media (min-width: 400px) {
      .container {
        width: 85%;
        padding: 0; }
      }

      /* For devices larger than 550px */
      @media (min-width: 550px) {
        .container {
          width: 80%; }
          .column,
          .columns {
            margin-left: 4%; }
            .column:first-child,
            .columns:first-child {
              margin-left: 0; }

              .one.column,
              .one.columns                    { width: 4.66666666667%; }
              .two.columns                    { width: 13.3333333333%; }
              .three.columns                  { width: 22%;            }
              .four.columns                   { width: 30.6666666667%; }
              .five.columns                   { width: 39.3333333333%; }
              .six.columns                    { width: 48%;            }
              .seven.columns                  { width: 56.6666666667%; }
              .eight.columns                  { width: 65.3333333333%; }
              .nine.columns                   { width: 74.0%;          }
              .ten.columns                    { width: 82.6666666667%; }
              .eleven.columns                 { width: 91.3333333333%; }
              .twelve.columns                 { width: 100%; margin-left: 0; }

              .one-third.column               { width: 30.6666666667%; }
              .two-thirds.column              { width: 65.3333333333%; }

              .one-half.column                { width: 48%; }

              /* Offsets */
              .offset-by-one.column,
              .offset-by-one.columns          { margin-left: 8.66666666667%; }
              .offset-by-two.column,
              .offset-by-two.columns          { margin-left: 17.3333333333%; }
              .offset-by-three.column,
              .offset-by-three.columns        { margin-left: 26%;            }
              .offset-by-four.column,
              .offset-by-four.columns         { margin-left: 34.6666666667%; }
              .offset-by-five.column,
              .offset-by-five.columns         { margin-left: 43.3333333333%; }
              .offset-by-six.column,
              .offset-by-six.columns          { margin-left: 52%;            }
              .offset-by-seven.column,
              .offset-by-seven.columns        { margin-left: 60.6666666667%; }
              .offset-by-eight.column,
              .offset-by-eight.columns        { margin-left: 69.3333333333%; }
              .offset-by-nine.column,
              .offset-by-nine.columns         { margin-left: 78.0%;          }
              .offset-by-ten.column,
              .offset-by-ten.columns          { margin-left: 86.6666666667%; }
              .offset-by-eleven.column,
              .offset-by-eleven.columns       { margin-left: 95.3333333333%; }

              .offset-by-one-third.column,
              .offset-by-one-third.columns    { margin-left: 34.6666666667%; }
              .offset-by-two-thirds.column,
              .offset-by-two-thirds.columns   { margin-left: 69.3333333333%; }

              .offset-by-one-half.column,
              .offset-by-one-half.columns     { margin-left: 52%; }

            }


/* Base Styles
–––––––––––––––––––––––––––––––––––––––––––––––––– */
/* NOTE
html is set to 62.5% so that all the REM measurements throughout Skeleton
are based on 10px sizing. So basically 1.5rem = 15px :) */
html {
  font-size: 62.5%; }
  body {
    font-size: 1.5em; /* currently ems cause chrome bug misinterpreting rems on body element */
    line-height: 1.6;
    font-weight: 400;
    font-family: 'Red Hat Display';
    color: #222; }


/* Typography
–––––––––––––––––––––––––––––––––––––––––––––––––– */
h1, h2, h3, h4, h5, h6 {
  margin-top: 0;
  margin-bottom: 2rem;
  font-weight: 500;
  display: flex;
  align-items: center;
  align-content: center;
  justify-content: center;
  flex-wrap: wrap;
  height: 50px;
}

h1 { font-size: 1.4em; line-height: 1.4;}
h2 { font-size: 1.2em; line-height: 1.2;}


/* Larger than phablet */
@media (min-width: 550px) {
  h1 { font-size: 1.6em; line-height: 1.4;}
  h2 { font-size: 1.4em; line-height: 1.2;}
}

p {
  margin-top: 0; }


/* Links
–––––––––––––––––––––––––––––––––––––––––––––––––– */
a {
  color: #1EAEDB; text-decoration: none;}
  a:hover {
    color: #0FA0CE; }


/* Buttons
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.button,
button,
input[type="submit"],
input[type="reset"],
input[type="button"] {
  display: inline-block;
  height: 38px;
  padding: 0 30px;
  color: white;
  text-align: center;
  font-size: 11px;
  font-weight: 600;
  line-height: 38px;
  letter-spacing: .1rem;
  text-transform: uppercase;
  text-decoration: none;
  white-space: nowrap;
  background-color: #0080FF;
  border-radius: 4px;
  border: 0px solid #bbb;
  cursor: pointer;
  box-sizing: border-box; }
  .button:hover,
  button:hover,
  input[type="submit"]:hover,
  input[type="reset"]:hover,
  input[type="button"]:hover,
  .button:focus,
  button:focus,
  input[type="submit"]:focus,
  input[type="reset"]:focus,
  input[type="button"]:focus {
    color: white;
    border-color: #FF4D00;
    outline: 0; 
    background-color: #FF4D00;
  }
  .button.button-primary,
  button.button-primary,
  input[type="submit"].button-primary,
  input[type="reset"].button-primary,
  input[type="button"].button-primary {
    color: #FFF;
    background-color: #FF4D00;
    border-color: #33C3F0; }
    .button.button-primary:hover,
    button.button-primary:hover,
    input[type="submit"].button-primary:hover,
    input[type="reset"].button-primary:hover,
    input[type="button"].button-primary:hover,
    .button.button-primary:focus,
    button.button-primary:focus,
    input[type="submit"].button-primary:focus,
    input[type="reset"].button-primary:focus,
    input[type="button"].button-primary:focus {
      color: #FFF;
      background-color: #1EAEDB;
      border-color: #1EAEDB; }


/* Forms
–––––––––––––––––––––––––––––––––––––––––––––––––– */
input[type="email"],
input[type="number"],
input[type="search"],
input[type="text"],
input[type="tel"],
input[type="url"],
input[type="password"],
textarea,
select {
  height: 38px;
  padding: 6px 10px; /* The 6px vertically centers text on FF, ignored by Webkit */
  background-color: #fff;
  border: 1px solid #D1D1D1;
  color: #222;
  border-radius: 4px;
  box-shadow: none;
  box-sizing: border-box; }
  /* Removes awkward default styles on some inputs for iOS */
  input[type="email"],
  input[type="number"],
  input[type="search"],
  input[type="text"],
  input[type="tel"],
  input[type="url"],
  input[type="password"],
  textarea {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none; }
    textarea {
      min-height: 65px;
      padding-top: 6px;
      padding-bottom: 6px; }
      input[type="email"]:focus,
      input[type="number"]:focus,
      input[type="search"]:focus,
      input[type="text"]:focus,
      input[type="tel"]:focus,
      input[type="url"]:focus,
      input[type="password"]:focus,
      textarea:focus,
      select:focus {
        border: 1px solid #33C3F0;
        outline: 0; }
        label,
        legend {
          display: block;
          margin-bottom: .5rem;
          font-weight: 600; }
          fieldset {
            padding: 0;
            border-width: 0; }
            input[type="checkbox"],
            input[type="radio"] {
              display: inline; }
              label > .label-body {
                display: inline-block;
                margin-left: .5rem;
                font-weight: normal; }


/* Lists
–––––––––––––––––––––––––––––––––––––––––––––––––– */
ul {
  list-style: circle inside; }
  ol {
    list-style: decimal inside; }
    ol, ul {
      padding-left: 0;
      margin-top: 0; }
      ul ul,
      ul ol,
      ol ol,
      ol ul {
        margin: 1.5rem 0 1.5rem 3rem;
        font-size: 90%; }
        li {
          margin-bottom: 1rem; }


/* Code
–––––––––––––––––––––––––––––––––––––––––––––––––– */
code {
  padding: .2rem .5rem;
  margin: 0 .2rem;
  font-size: 90%;
  white-space: nowrap;
  background: #F1F1F1;
  border: 1px solid #E1E1E1;
  border-radius: 4px; }
  pre > code {
    display: block;
    padding: 1rem 1.5rem;
    white-space: pre; }


/* Tables
–––––––––––––––––––––––––––––––––––––––––––––––––– */
th,
td {
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #E1E1E1; }
  th:first-child,
  td:first-child {
    padding-left: 0; }
    th:last-child,
    td:last-child {
      padding-right: 0; }


/* Spacing
–––––––––––––––––––––––––––––––––––––––––––––––––– */
button,
.button {
  margin-bottom: 1rem; }
  input,
  textarea,
  select,
  fieldset {
    margin-bottom: 1.5rem; }
    pre,
    blockquote,
    dl,
    figure,
    table,
    p,
    ul,
    ol,
    form {
      margin-bottom: 2.5rem; }


/* Utilities
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.u-full-width {
  width: 100%;
  box-sizing: border-box; }
  .u-max-full-width {
    max-width: 100%;
    box-sizing: border-box; }
    .u-pull-right {
      float: right; }
      .u-pull-left {
        float: left; }


/* Misc
–––––––––––––––––––––––––––––––––––––––––––––––––– */
hr {
  margin-top: 3rem;
  margin-bottom: 3.5rem;
  border-width: 0;
  border-top: 1px solid #E1E1E1; }


/* Clearing
–––––––––––––––––––––––––––––––––––––––––––––––––– */

/* Self Clearing Goodness */
.container:after,
.row:after,
.u-cf {
  content: "";
  display: table;
  clear: both; }


/* Media Queries
–––––––––––––––––––––––––––––––––––––––––––––––––– */
/*
Note: The best way to structure the use of media queries is to create the queries
near the relevant code. For example, if you wanted to change the styles for buttons
on small devices, paste the mobile query code up in the buttons section and style it
there.
*/


/* Larger than mobile */
@media (min-width: 400px) {}

/* Larger than phablet (also point when grid becomes active) */
@media (min-width: 550px) {}

/* Larger than tablet */
@media (min-width: 750px) {}

/* Larger than desktop */
@media (min-width: 1000px) {}

/* Larger than Desktop HD */
@media (min-width: 1200px) {}


/**
 * 1. Set default font family to sans-serif.
 * 2. Prevent iOS text size adjust after orientation change, without disabling
 *    user zoom.
 */


 html {
  font-family: sans-serif; /* 1 */
  -ms-text-size-adjust: 100%; /* 2 */
  -webkit-text-size-adjust: 100%; /* 2 */
}

/**
 * Remove default margin.
 */

 body {
  margin: 0;
  font-family: 'Red Hat Display';
  font-style: normal;
  font-weight: 400;
}

/* HTML5 display definitions
========================================================================== */

/**
 * Correct `block` display not defined for any HTML5 element in IE 8/9.
 * Correct `block` display not defined for `details` or `summary` in IE 10/11
 * and Firefox.
 * Correct `block` display not defined for `main` in IE 11.
 */

 article,
 aside,
 details,
 figcaption,
 figure,
 footer,
 header,
 hgroup,
 main,
 menu,
 nav,
 section,
 summary {
  display: block;
}

/**
 * 1. Correct `inline-block` display not defined in IE 8/9.
 * 2. Normalize vertical alignment of `progress` in Chrome, Firefox, and Opera.
 */

 audio,
 canvas,
 progress,
 video {
  display: inline-block; /* 1 */
  vertical-align: baseline; /* 2 */
}

/**
 * Prevent modern browsers from displaying `audio` without controls.
 * Remove excess height in iOS 5 devices.
 */

 audio:not([controls]) {
  display: none;
  height: 0;
}

/**
 * Address `[hidden]` styling not present in IE 8/9/10.
 * Hide the `template` element in IE 8/9/11, Safari, and Firefox < 22.
 */

 [hidden],
 template {
  display: none;
}

/* Links
========================================================================== */

/**
 * Remove the gray background color from active links in IE 10.
 */

 a {
  background-color: transparent;
}

/**
 * Improve readability when focused and also mouse hovered in all browsers.
 */

 a:active,
 a:hover {
  outline: 0;
}

/* Text-level semantics
========================================================================== */

/**
 * Address styling not present in IE 8/9/10/11, Safari, and Chrome.
 */

 abbr[title] {
  border-bottom: 1px dotted;
}

/**
 * Address style set to `bolder` in Firefox 4+, Safari, and Chrome.
 */

 b,
 strong {
  font-weight: bold;
}

/**
 * Address styling not present in Safari and Chrome.
 */

 dfn {
  font-style: italic;
}

/**
 * Address variable `h1` font-size and margin within `section` and `article`
 * contexts in Firefox 4+, Safari, and Chrome.
 */


/**
 * Address styling not present in IE 8/9.
 */

 mark {
  background: #ff0;
  color: #000;
}

/**
 * Address inconsistent and variable font size in all browsers.
 */

 small {
  font-size: 80%;
}

/**
 * Prevent `sub` and `sup` affecting `line-height` in all browsers.
 */

 sub,
 sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sup {
  top: -0.5em;
}

sub {
  bottom: -0.25em;
}

/* Embedded content
========================================================================== */

/**
 * Remove border when inside `a` element in IE 8/9/10.
 */

 img {
  border: 0;
}

/**
 * Correct overflow not hidden in IE 9/10/11.
 */

 svg:not(:root) {
  overflow: hidden;
}

/* Grouping content
========================================================================== */

/**
 * Address margin not present in IE 8/9 and Safari.
 */

 figure {
  margin: 1em 40px;
}

/**
 * Address differences between Firefox and other browsers.
 */

 hr {
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  height: 0;
}

/**
 * Contain overflow in all browsers.
 */

 pre {
  overflow: auto;
}

/**
 * Address odd `em`-unit font size rendering in all browsers.
 */

 code,
 kbd,
 pre,
 samp {
  font-family: monospace, monospace;
  font-size: 1em;
}

/* Forms
========================================================================== */

/**
 * Known limitation: by default, Chrome and Safari on OS X allow very limited
 * styling of `select`, unless a `border` property is set.
 */

/**
 * 1. Correct color not being inherited.
 *    Known issue: affects color of disabled elements.
 * 2. Correct font properties not being inherited.
 * 3. Address margins set differently in Firefox 4+, Safari, and Chrome.
 */

 button,
 input,
 optgroup,
 select,
 textarea {
  color: inherit; /* 1 */
  font: inherit; /* 2 */
  margin: 0; /* 3 */
}

/**
 * Address `overflow` set to `hidden` in IE 8/9/10/11.
 */

 button {
  overflow: visible;
}

/**
 * Address inconsistent `text-transform` inheritance for `button` and `select`.
 * All other form control elements do not inherit `text-transform` values.
 * Correct `button` style inheritance in Firefox, IE 8/9/10/11, and Opera.
 * Correct `select` style inheritance in Firefox.
 */

 button,
 select {
  text-transform: none;
}

/**
 * 1. Avoid the WebKit bug in Android 4.0.* where (2) destroys native `audio`
 *    and `video` controls.
 * 2. Correct inability to style clickable `input` types in iOS.
 * 3. Improve usability and consistency of cursor style between image-type
 *    `input` and others.
 */

 button,
 html input[type="button"], /* 1 */
 input[type="reset"],
 input[type="submit"] {
  -webkit-appearance: button; /* 2 */
  cursor: pointer; /* 3 */
}

/**
 * Re-set default cursor for disabled elements.
 */

 button[disabled],
 html input[disabled] {
  cursor: default;
}

/**
 * Remove inner padding and border in Firefox 4+.
 */

 button::-moz-focus-inner,
 input::-moz-focus-inner {
  border: 0;
  padding: 0;
}

/**
 * Address Firefox 4+ setting `line-height` on `input` using `!important` in
 * the UA stylesheet.
 */

 input {
  line-height: normal;
}

/**
 * It's recommended that you don't attempt to style these elements.
 * Firefox's implementation doesn't respect box-sizing, padding, or width.
 *
 * 1. Address box sizing set to `content-box` in IE 8/9/10.
 * 2. Remove excess padding in IE 8/9/10.
 */

 input[type="checkbox"],
 input[type="radio"] {
  box-sizing: border-box; /* 1 */
  padding: 0; /* 2 */
}

/**
 * Fix the cursor style for Chrome's increment/decrement buttons. For certain
 * `font-size` values of the `input`, it causes the cursor style of the
 * decrement button to change from `default` to `text`.
 */

 input[type="number"]::-webkit-inner-spin-button,
 input[type="number"]::-webkit-outer-spin-button {
  height: auto;
}

/**
 * 1. Address `appearance` set to `searchfield` in Safari and Chrome.
 * 2. Address `box-sizing` set to `border-box` in Safari and Chrome
 *    (include `-moz` to future-proof).
 */

 input[type="search"] {
  -webkit-appearance: textfield; /* 1 */
  -moz-box-sizing: content-box;
  -webkit-box-sizing: content-box; /* 2 */
  box-sizing: content-box;
}

/**
 * Remove inner padding and search cancel button in Safari and Chrome on OS X.
 * Safari (but not Chrome) clips the cancel button when the search input has
 * padding (and `textfield` appearance).
 */

 input[type="search"]::-webkit-search-cancel-button,
 input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

/**
 * Define consistent border, margin, and padding.
 */

 fieldset {
  border: 1px solid #c0c0c0;
  margin: 0 2px;
  padding: 0.35em 0.625em 0.75em;
}

/**
 * 1. Correct `color` not being inherited in IE 8/9/10/11.
 * 2. Remove padding so people aren't caught out if they zero out fieldsets.
 */

 legend {
  border: 0; /* 1 */
  padding: 0; /* 2 */
}

/**
 * Remove default vertical scrollbar in IE 8/9/10/11.
 */

 textarea {
  overflow: auto;
}

/**
 * Don't inherit the `font-weight` (applied by a rule above).
 * NOTE: the default cannot safely be changed in Chrome and Safari on OS X.
 */

 optgroup {
  font-weight: bold;
}

/* Tables
========================================================================== */

/**
 * Remove most spacing between table cells.
 */

 table {
  border-collapse: collapse;
  border-spacing: 0;
}

td,
th {
  padding: 0;
}

* {
  box-sizing: border-box;
}


.w1{width: 100%}
.w2{width: 100%}
.w3{width: 100%}
.w4{width: 100%}
.w5{width: 100%}
.w6{width: 100%}
.w7{width: 100%}
.w8{width: 100%}
.w9{width: 100%}
.w10{width: 100%}
.w11{width: 100%}
.w12{width: 100%}
.w13{width: 100%}
.w14{width: 100%}
.w15{width: 100%}
.w16{width: 100%}
.w17{width: 100%}
.w18{width: 100%}
.w19{width: 100%}
.w20{width: 100%}
.w21{width: 100%}
.w22{width: 100%}
.w23{width: 100%}
.w24{width: 100%}
.w25{width: 100%}
.w26{width: 100%}
.w27{width: 100%}
.w28{width: 100%}
.w29{width: 100%}
.w30{width: 100%}
.w31{width: 100%}
.w32{width: 100%}
.w33{width: 100%}
.w34{width: 100%}
.w35{width: 100%}
.w36{width: 100%}
.w37{width: 100%}
.w38{width: 100%}
.w39{width: 100%}
.w40{width: 100%}
.w41{width: 100%}
.w42{width: 100%}
.w43{width: 100%}
.w44{width: 100%}
.w45{width: 100%}
.w46{width: 100%}
.w47{width: 100%}
.w48{width: 100%}
.w49{width: 100%}
.w50{width: 100%}
.w51{width: 100%}
.w52{width: 100%}
.w53{width: 100%}
.w54{width: 100%}
.w55{width: 100%} 
.w56{width: 100%}
.w57{width: 100%}
.w58{width: 100%}
.w59{width: 100%}
.w60{width: 100%}
.w61{width: 100%}
.w62{width: 100%}
.w63{width: 100%}
.w64{width: 100%}
.w65{width: 100%}
.w66{width: 100%}
.w67{width: 100%}
.w68{width: 100%}
.w69{width: 100%}
.w70{width: 100%}
.w71{width: 100%}
.w72{width: 100%}
.w73{width: 100%}
.w74{width: 100%}
.w75{width: 100%}
.w76{width: 100%}
.w77{width: 100%}
.w78{width: 100%}
.w79{width: 100%}
.w80{width: 100%}
.w81{width: 100%}
.w82{width: 100%}
.w83{width: 100%}
.w84{width: 100%}
.w85{width: 100%}
.w86{width: 100%}
.w87{width: 100%}
.w88{width: 100%}
.w89{width: 100%}
.w90{width: 100%}
.w91{width: 100%}
.w92{width: 100%}   
.w93{width: 100%}
.w94{width: 100%}
.w95{width: 100%}  
.w96{width: 100%}
.w97{width: 100%}
.w98{width: 100%}
.w99{width:100%;}
.w100 {width:100%;}

.cnt-titulo {
  background-color: transparent;
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  text-align: left;
  padding: 0 20px;
}

.cnt-conteudo {
  background-color: transparent;
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  text-align: left;
  padding: 0 15px;
}


/* MIN 550 */


@media (min-width: 550px) {

  .w1 {width: 1%;}
  .w2 {width: 2%;}
  .w3 {width: 3%;}
  .w4 {width: 4%;}
  .w5 {width: 5%;}
  .w6 {width: 6%;}
  .w7 {width: 7%;}
  .w8 {width: 8%;}
  .w9 {width: 9%;}
  .w10 {width: 10%;}
  .w11 {width: 11%;}
  .w12 {width: 12%;}
  .w13 {width: 13%;}
  .w14 {width: 14%;}
  .w15 {width: 15%;}
  .w16 {width: 16%;}
  .w17 {width: 17%;}
  .w18 {width: 18%;}
  .w19 {width: 19%;}
  .w20 {width: 20%;}
  .w21 {width: 21%;}
  .w22 {width: 22%;}
  .w23 {width: 23%;}
  .w24 {width: 24%;}
  .w25 {width: 25%;}
  .w26 {width: 26%;}
  .w27 {width: 27%;}
  .w28 {width: 28%;}
  .w29 {width: 29%;}
  .w30 {width: 30%;}
  .w31 {width: 31%;}
  .w32 {width: 32%;}
  .w33 {width: 33%;}
  .w34 {width: 34%;}
  .w35 {width: 35%;}
  .w36 {width: 36%;}
  .w37 {width: 37%;}
  .w38 {width: 38%;}
  .w39 {width: 39%;}
  .w40 {width: 40%;}
  .w41 {width: 41%;}
  .w42 {width: 42%;}
  .w43 {width: 43%;}
  .w44 {width: 44%;}
  .w45 {width: 45%;}
  .w46 {width: 46%;}
  .w47 {width: 47%;}
  .w48 {width: 48%;}
  .w49 {width: 49%;}
  .w50 {width: 50%;}
  .w51 {width: 51%;}
  .w52 {width: 52%;}
  .w53 {width: 53%;}
  .w54 {width: 54%;}
  .w55 {width: 55%;}  
  .w56 {width: 56%;}
  .w57 {width: 57%;}
  .w58 {width: 58%;}
  .w59 {width: 59%;}
  .w60 {width: 60%;}
  .w61 {width: 61%;}
  .w62 {width: 62%;}
  .w63 {width: 63%;}
  .w64 {width: 64%;}
  .w65 {width: 65%;}
  .w66 {width: 66%;}
  .w67 {width: 67%;}
  .w68 {width: 68%;}
  .w69 {width: 69%;}
  .w70 {width: 70%;}
  .w71 {width: 71%;}
  .w72 {width: 72%;}
  .w73 {width: 73%;}
  .w74 {width: 74%;}
  .w75 {width: 75%;}
  .w76 {width: 76%;}
  .w77 {width: 77%;}
  .w78 {width: 78%;}
  .w79 {width: 79%;}
  .w80 {width: 80%;}
  .w81 {width: 81%;}
  .w82 {width: 82%;}
  .w83 {width: 83%;}
  .w84 {width: 84%;}
  .w85 {width: 85%;}
  .w86 {width: 86%;}
  .w87 {width: 87%;}
  .w88 {width: 88%;}
  .w89 {width: 89%;}
  .w90 {width: 90%;}
  .w91 {width: 91%;}  
  .w92 {width: 92%;}   
  .w93 {width: 93%;}   
  .w94 {width: 94%;}   
  .w95 {width: 95%;}   
  .w96 {width: 96%;}   
  .w97 {width: 97%;}   
  .w98 {width: 98%;}   
  .w99 {width: 99%;}   
  .w100 {width: 100%;}
}

img {
  height: auto;
  max-width: 100%;
}
.esquerda {
 text-align: left;
}
.centro {
 text-align: center;
}
.direita {
 text-align: right;
}


.frame {
  display: flex;
  align-content: center;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  box-sizing: border-box;
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
}


.texto-branco { color: white;}
.texto-amarelo { color: yellow;}
.texto-azul { color: #5499C7;}
.texto-vermelho { color: red;}
.texto-verde { color: green;}
.texto-laramje { color: skyblue;}

.titulo-branco h2 { color: white;}
.titulo-amarelo  h2 { color: yellow;}
.titulo-azul  h2 { color: #5499C7;}
.titulo-vermelho  h2 { color: red;}
.titulo-verde h2 { color: green;}
.titulo-laramje h2 { color: skyblue;}

.link-branco a { color: white!important;}
.link-amarelo  a { color: lightblue!important;}
.link-azul  a { color: blue!important;}
.link-vermelho  a { color: red!important;}
.link-verde  a { color: green!important;}
.link-laranja  a { color: skyblue!important;}

.fundo-branco a { color: white;}
.fundo-amarelo  a { color: yellow;}
.fundo-azul  a { color: #5499C7;}
.fundo-vermelho  a { color: red;}
.fundo-verde  a { color: green;}
.fundo-laranja  a { color: skyblue;}

.margen-base-1  { margin-bottom: 25px;}
.margen-base-2  { margin-bottom: 50px;}
.margen-base-3  { margin-bottom: 75px;}
.margen-base-4  { margin-bottom: 100px;}



/* DESTAQUES */

.destaque1 {
  background-color: aliceblue;
  padding-top: 25px;
}

.destaque2 {
  background-color: #5499C7;
  padding-top: 25px;
}

.editar {
  background-color: rgba(255,255,0, 0.2);
  font-size: 0;
  padding: 15px;
  line-height: 0;
  text-transform: uppercase;
  color: transparent;
  font-weight: bold;
  position: absolute;
  border: 1px solid skyblue;
  border-radius: 50%;
  z-index: 999999;
}

.editar:hover {
  font-size: 12px;
  padding: 12px;
  text-transform: uppercase;
  color: tomato;
  font-weight: bold;
  position: absolute;
  border: 0;
  border-radius: 0;
  background-color: rgba(255,255,0, 10);
  letter-spacing: 1px;
}

hr {
  border: 0;
  border-bottom: 1px solid tomato;
  width: 100%;
}

.paginacao {
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-items: stretch;
  align-content: flex-start;
  justify-content: center;
  flex-wrap: wrap;
  box-sizing: border-box;
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
}

.paginacao li {
  list-style: none;
}

.paginacao li a {
  padding: 10px;
  border: 1px solid #1EAEDB;
  margin: 5px;
}

.paginacao li a:hover {
  border: 1px solid skyblue;
}

.voltar-pagina {
  position: fixed;
  bottom: 50px;
  left: 0;
  font-size: 0;
}

.voltar-pagina a:before {
  content: "";
  position: absolute;
  border-top: 2px solid transparent;
  border-bottom: 2px solid skyblue;
  border-left: 2px solid skyblue;
  border-right: 2px solid transparent;
  line-height: 0;
  padding: 10px;
  font-size: 0;
  -moz-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  left: 10px;
}



.trash.icon {
  border: 1px solid black;
  background-color: red;
  padding: 5px 4px;
  position: relative;
  margin-left: -5px;
  line-height: 0;
  font-size: 0;
  border-radius: 2px;
}

.trash.icon:hover {
  background-color: lightblue;
  border: lightblue;
}

.trash.icon:before {
  content: '';
  position: absolute;
  left: -4px;
  top: 2px;
  width: 16px;
  height: 1px;
  color: red;
  border-top: 1px solid black;
}

.trash.icon:after {
  content: '';
  position: absolute;
  left: -2px;
  top: 0px;
  width: 12px;
  height: 1px;
  color: red;
  border-top: 2px solid gray;
  border-bottom: 1px solid white;
}

/****************************************/
/* FORM CONTATO */
/****************************************/

.form-contato {
	padding: 20px;
	padding-bottom: 50px;
	box-sizing: border-box;}

  .form-contato h2 {
   color: white;
   margin: 0;
   padding: 0;
   line-height: 25px;
   font-size: 25px;
   margin-bottom: 20px;
 }

 #cnt-form-contato {
   width: 100%;
   box-sizing: border-box;
 }

 .form-contato h2 {
   text-transform: uppercase;
   color: black;
 }

 .cnt-form-contato {
   display: flex;
   align-items: center;
   align-content: center;
   justify-content: flex-start;
   flex-wrap: wrap;
   box-sizing: border-box;
   padding-bottom: 0;
   width: 100%;
   max-width: 800px;
   margin: 0 auto;
   padding: 20px;
 }

 .cnt-form-contato > div {
   width: 100%;
   box-sizing: border-box;
   padding-right: 5px;
   margin-bottom: 10px;
 }

 .cnt-form-contato label {
   width: 100%;
   box-sizing: border-box;
   display: block;
   text-transform: uppercase;
   font-size: 12px;
   color: black;
 }
 .cnt-form-contato > div {
   width: 100%;
 }

 .cnt-form-contato input {
   width: 100%;
   box-sizing: border-box;
   padding: 10px;
   border: 1px solid #e9ecef;
   background: aliceblue;
 }

 .cnt-form-contato textarea {
   width: 100%;
   box-sizing: border-box;
   padding: 10px;
   border: 1px solid #e9ecef;
   height: 150px;
   background: aliceblue;
 }

 .cnt-form-contato select {
   width: 100%;
   box-sizing: border-box;
   padding: 10px;
   height: 35px;
   background-color: aliceblue;
   margin: 0;
   border: 1px solid #e9ecef;
   background: aliceblue;
 }

 .cnt-form-contato > div:nth-child(4) {
   width: 80%;
 }
 .cnt-form-contato > div:nth-child(5) {
   width: 20%;
 }

 @media (min-width: 550px) {


  .cnt-form-contato > div {
   width: 50%;
 }

 .cnt-form-contato > div:nth-child(1) {
   width: 33%;
 }

 .cnt-form-contato > div:nth-child(2) {
   width: 33%;
 }

 .cnt-form-contato > div:nth-child(3) {
   width: 34%;
 }

 .cnt-form-contato > div:nth-child(4) {
   width: 80%;
 }

 .cnt-form-contato > div:nth-child(5) {
   width: 20%;
 }

 .cnt-form-contato > div:nth-child(6) {
   width: 100%;
 }
 .cnt-form-contato > div:nth-child(7) {
   width: 100%;
 }

}


/* IFRAME */

iframe {
  width: 100%;
  max-width: 100%;
  height: auto;
}

@media (min-width: 550px) {

  iframe {
    width: 100%;
    max-width: 100%;
  }

}


#form-busca {
  display: none;
}

.icone-busca-desk span {
  border: 1px solid #0080FF;
  border-radius: 50%;
  width: 15px;
  height: 15px;
  position: relative;
  display: block;
  margin-top: -14px;
  margin-left: 10px;
}

.icone-busca-desk span:before {
  content: "";
  border: 1px solid #0080FF;
  position: absolute;
  width: 5px;
  top: 16px;
  left: -2px;
  transform: rotate(305deg);
  -webkit-transform: rotate(305deg);
  -moz-transform: rotate(305deg);
  -o-transform: rotate(305deg);
  -ms-transform: rotate(305deg);
}

.icone-busca-desk span:after {
  content: "";
  border-top: 1px solid #0080FF;
  border-radius: 50%;
  position: absolute;
  top: 2px;
  left: 2px;
  padding: 5px;
}

/* ONDE ESTOU */

.onde-estou {
 display: flex;
 align-items: center;
 align-content: center;
 justify-content: center;
 flex-wrap: wrap;
 width: 100%;
 max-width: 1024px;
 margin: 0 auto;
}

.onde-estou li {
 width: 100%;
 padding: 0 20px;
 position: relative;
 list-style: none;
}

.onde-estou li:before {
content: "";
position: absolute;
top: 8px;
left: 0;
padding: 2px;
border: 2px solid green;
  -moz-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  border-left: 2px solid transparent;
  border-bottom: 2px solid transparent;
}

.onde-estou li:nth-child(1):before {
  display: none;
}

@media (min-width: 550px) {

.onde-estou {
 display: flex;
 align-items: center;
 align-content: center;
 justify-content: center;
 flex-wrap: wrap;
 width: 100%;
 max-width: 1024px;
 margin: 0 auto;
}

.onde-estou li {
 width: auto;
}

}

</style>