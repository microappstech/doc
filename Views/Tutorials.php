<?php include("../Includes/NavBar.php") ?>
    <?php include("../Services/TutorialService.php") ?>
    <?php include("../Config/Config.php") ?>
    <?php include("../Models/Tutorail.php") ?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
  <link rel="shortcut icon" href="../Assets/img/favIcon.png" type="image/x-icon">
</head>
<body class="bg-gray-100">
<div class="main">
      <div class='flex min-h-screen items-center justify-center min-h-screen px-24'>
      <div class="w-full">
        <div class="mt-8 grid grid-cols-3 gap-4 md:grid-cols-4" id="frameworks-integration">
          <!-- <a class="grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="./Tutorial.php">
              <span class="my-6 grid h-24 w-24 place-items-center">
              <svg class="mx-auto" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.788 14.842h6.865v.557h-6.235v4.189h5.864v.557h-5.864v4.599h6.307v.557h-6.937V14.842zm7.48 0h.73l3.232 4.6 3.304-4.6L30.028 9l-7.383 10.925L26.45 25.3h-.758l-3.462-4.893-3.475 4.893h-.744l3.833-5.376-3.575-5.083zm8.454.557v-.557h7.823v.557h-3.604V25.3h-.63v-9.902h-3.59zm-24.523-.557h.787L13.833 31.4l-4.482-6.1-6.494-9.667-.029 9.668H2.2V14.842zm32.283 9.734a.225.225 0 01-.225-.233.225.225 0 11.45 0 .224.224 0 01-.225.233zm.618-.613h.337c.005.186.138.311.334.311.219 0 .343-.134.343-.386v-1.594h.342v1.596c0 .453-.257.714-.682.714-.4 0-.674-.253-.674-.64zm1.805-.02h.34c.029.214.234.35.53.35.275 0 .477-.145.477-.345 0-.172-.129-.276-.421-.346l-.285-.07c-.4-.096-.582-.293-.582-.624 0-.402.322-.67.804-.67.448 0 .776.268.796.648h-.334c-.032-.208-.21-.338-.467-.338-.27 0-.451.133-.451.336 0 .161.116.254.404.322l.243.061c.453.108.64.296.64.635 0 .432-.328.702-.85.702-.49 0-.82-.258-.844-.661z" fill="#000"></path>
              </svg>
              </span>
          </a>
          <a class="grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="#">
              <span class="my-6 grid h-24 w-24 place-items-center">
              <svg class="mx-auto" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M29.58 18.828c0-1.206-1.42-2.276-3.603-2.93.525-2.217.296-3.983-.75-4.58a1.673 1.673 0 00-.838-.21c-.975 0-2.208.681-3.453 1.86-1.244-1.17-2.473-1.847-3.447-1.847a1.657 1.657 0 00-.85.213c-1.04.599-1.256 2.354-.738 4.56-2.173.65-3.586 1.712-3.59 2.912-.003 1.202 1.423 2.276 3.606 2.928-.525 2.22-.298 3.983.75 4.58.254.143.544.215.836.21.977 0 2.21-.681 3.454-1.86 1.243 1.17 2.473 1.848 3.448 1.848.297.005.59-.069.85-.214 1.04-.598 1.255-2.353.738-4.552 2.172-.658 3.585-1.72 3.587-2.918zm-7.84-5.465c1.433-1.284 2.329-1.422 2.647-1.422a.826.826 0 01.424.101c.501.286.7 1.293.541 2.627-.04.34-.099.679-.175 1.013a17.111 17.111 0 00-2.202-.362 17.227 17.227 0 00-1.443-1.764c.067-.067.136-.13.207-.193zM17.4 19.82c.135.262.28.525.43.79.152.264.31.531.484.796a16.43 16.43 0 01-1.372-.256c.122-.444.278-.882.456-1.33h.001zm-.486-3.334c.443-.103.907-.189 1.388-.255-.175.259-.325.525-.483.803-.157.278-.296.525-.431.792a20.58 20.58 0 01-.474-1.34zm.912 2.335c.222-.467.46-.926.716-1.375.261-.455.54-.9.835-1.333a20.329 20.329 0 013.133.003c.29.425.568.876.83 1.323.263.446.505.913.722 1.37a19.746 19.746 0 01-1.55 2.708c-1.042.081-2.09.08-3.132-.003-.295-.43-.573-.87-.833-1.321a20.542 20.542 0 01-.714-1.371h-.007zm5.753-2.585c.476.066.937.152 1.372.254-.134.447-.288.888-.462 1.322a25.529 25.529 0 00-.903-1.576h-.007zm.483 4.363c.15-.265.294-.53.431-.794.175.456.35.904.473 1.342-.459.106-.921.19-1.387.253.17-.259.332-.526.49-.801h-.007zM20.94 14.15c.315.336.625.7.927 1.091-.305-.013-.61-.02-.915-.021-.31 0-.626 0-.933.021.29-.378.597-.742.92-1.09zm-3.883-2.101a.852.852 0 01.432-.098 2.3 2.3 0 01.909.23 6.838 6.838 0 011.75 1.186l.206.188a17.189 17.189 0 00-1.43 1.75c-.745.073-1.484.194-2.214.362a8.895 8.895 0 01-.175-.993c-.182-1.322.028-2.33.52-2.618l.002-.007zm-.927 8.877c-.328-.1-.652-.218-.97-.35-1.242-.525-2.013-1.2-2.013-1.776 0-.576.774-1.246 2.016-1.763.311-.129.629-.242.952-.34.218.726.486 1.436.798 2.126a17.302 17.302 0 00-.783 2.103zm4.027 3.344c-1.434 1.283-2.33 1.42-2.65 1.42a.822.822 0 01-.424-.102c-.5-.286-.7-1.292-.54-2.626.04-.34.098-.678.174-1.012.726.167 1.461.287 2.202.36.441.62.923 1.21 1.443 1.765l-.204.195zm.8-.79a15.73 15.73 0 01-.93-1.09c.306.013.612.02.918.02.31 0 .627 0 .933-.019-.303.389-.61.753-.922 1.089h.001zm3.884 2.101a.845.845 0 01-.434.104c-.32 0-1.226-.14-2.654-1.419l-.206-.188c.514-.55.99-1.136 1.427-1.75a16.97 16.97 0 002.217-.361c.077.34.138.672.175.993.173 1.32-.028 2.328-.527 2.614l.002.007zm1.89-4.98a10.8 10.8 0 01-.952.34 17.233 17.233 0 00-.8-2.127c.308-.682.57-1.384.786-2.1.33.1.652.216.97.35 1.241.524 2.013 1.199 2.012 1.775-.002.576-.774 1.239-2.017 1.756l.001.007zm-5.791-.178a1.607 1.607 0 10.003-3.214 1.607 1.607 0 00-.003 3.214zM10.26 9.13v19.372h21.372V9.13H10.26zm20.537 18.539h-19.7V9.965h19.7v17.704zm-14.881-5.935c-.526 2.22-.298 3.983.749 4.58.255.143.544.215.836.21.977 0 2.21-.681 3.455-1.86 1.242 1.17 2.472 1.848 3.447 1.848.298.005.591-.069.85-.214 1.04-.598 1.255-2.353.738-4.552 2.172-.651 3.585-1.712 3.587-2.911.002-1.2-1.42-2.276-3.603-2.93.525-2.217.296-3.983-.75-4.58a1.673 1.673 0 00-.838-.21c-.975 0-2.207.681-3.452 1.86-1.245-1.17-2.474-1.847-3.448-1.847a1.656 1.656 0 00-.85.213c-1.04.599-1.256 2.354-.738 4.56-2.173.65-3.585 1.712-3.589 2.912-.003 1.202 1.423 2.266 3.607 2.921h-.002zm4.238 2.537c-1.434 1.283-2.33 1.42-2.651 1.42a.822.822 0 01-.424-.102c-.5-.286-.7-1.292-.54-2.626.04-.34.099-.678.175-1.012.725.167 1.46.287 2.202.36.44.62.923 1.21 1.442 1.765l-.204.195zm4.34-6.459a24.446 24.446 0 00-.434-.79c-.152-.264-.315-.525-.476-.785.476.066.936.151 1.372.253-.128.433-.282.875-.46 1.322h-.002zm.476 3.326c-.458.106-.92.191-1.386.254.328-.517.633-1.05.914-1.595.178.442.335.893.469 1.35l.003-.009zm-.912-2.337a19.746 19.746 0 01-1.55 2.708c-1.042.081-2.09.08-3.132-.003a19.614 19.614 0 01-1.554-2.692c.222-.468.46-.927.716-1.377.26-.455.54-.899.835-1.332a20.326 20.326 0 013.133.003c.29.424.568.876.83 1.323.263.446.507.922.724 1.379l-.002-.008zm-5.744 2.605c-.461-.066-.92-.15-1.373-.255.13-.43.286-.875.464-1.322.136.262.282.525.433.79.15.264.3.523.476.787zm-.488-4.377c-.153.263-.297.525-.432.792a17.626 17.626 0 01-.48-1.334c.442-.103.906-.19 1.387-.256-.163.26-.318.527-.475.798zm3.13 6.452c-.315-.336-.626-.7-.93-1.09.305.013.611.02.917.02.31 0 .627 0 .934-.019-.291.376-.599.74-.922 1.089zm3.883 2.101a.845.845 0 01-.434.104c-.32 0-1.226-.14-2.654-1.419l-.206-.188c.514-.55.99-1.136 1.427-1.75a16.988 16.988 0 002.217-.361c.077.34.138.672.175.993.175 1.32-.026 2.328-.525 2.614v.007zm.925-8.87c.329.101.652.218.969.35 1.241.526 2.014 1.2 2.012 1.776-.002.576-.772 1.254-2.015 1.77-.3.123-.617.236-.953.338a17.24 17.24 0 00-.8-2.126c.308-.687.571-1.393.787-2.114v.007zm-4.027-3.342c1.434-1.283 2.33-1.421 2.648-1.421a.828.828 0 01.424.101c.5.286.7 1.292.54 2.626-.04.341-.098.68-.174 1.014a17.09 17.09 0 00-2.203-.362 17.227 17.227 0 00-1.442-1.765c.066-.072.137-.137.208-.2l-.001.007zm-.797.781c.315.336.625.7.927 1.091-.305-.013-.61-.02-.915-.021-.31 0-.626 0-.933.021.29-.378.597-.742.92-1.09zm-3.883-2.101a.852.852 0 01.432-.098 2.3 2.3 0 01.909.23 6.838 6.838 0 011.75 1.186l.206.188a17.189 17.189 0 00-1.43 1.75c-.745.073-1.484.194-2.214.362a8.895 8.895 0 01-.175-.993c-.182-1.322.028-2.33.52-2.618l.002-.007zm-1.894 4.988c.311-.129.629-.242.952-.34.218.726.486 1.436.798 2.126-.307.682-.57 1.384-.786 2.1-.329-.1-.652-.216-.97-.35-1.243-.524-2.013-1.199-2.013-1.774 0-.576.777-1.245 2.018-1.762zm5.777.175a1.608 1.608 0 101.605 1.609 1.605 1.605 0 00-1.605-1.618v.01zm0 0a1.608 1.608 0 101.605 1.609 1.605 1.605 0 00-1.605-1.618v.01zm0 0a1.608 1.608 0 101.605 1.609 1.605 1.605 0 00-1.605-1.618v.01zm8.64 1.618c0-1.206-1.42-2.276-3.603-2.929.525-2.218.296-3.983-.75-4.58a1.673 1.673 0 00-.838-.21c-.975 0-2.208.68-3.453 1.86-1.244-1.17-2.473-1.848-3.447-1.848a1.657 1.657 0 00-.85.214c-1.04.598-1.256 2.353-.738 4.56-2.173.65-3.586 1.711-3.59 2.912-.003 1.201 1.423 2.276 3.606 2.928-.525 2.219-.298 3.983.75 4.58.254.142.544.215.836.21.977 0 2.21-.681 3.454-1.86 1.243 1.17 2.473 1.847 3.448 1.847.297.006.59-.068.85-.213 1.04-.599 1.255-2.354.738-4.552 2.172-.662 3.585-1.724 3.587-2.923v.004zm-7.84-5.467c1.433-1.284 2.329-1.422 2.647-1.422a.828.828 0 01.424.102c.501.285.7 1.292.541 2.626-.04.34-.099.679-.175 1.014a17.111 17.111 0 00-2.202-.363 17.227 17.227 0 00-1.443-1.764c.067-.067.136-.13.207-.193zM17.4 19.82c.135.263.28.525.43.79.152.264.31.531.484.796a16.43 16.43 0 01-1.372-.256c.122-.444.278-.882.456-1.33h.001zm-.486-3.334c.443-.103.907-.188 1.388-.255-.175.259-.325.525-.483.803-.157.279-.296.525-.431.792-.173-.441-.332-.888-.474-1.34zm.912 2.336c.222-.468.46-.927.716-1.376.261-.455.54-.9.835-1.333a20.33 20.33 0 013.133.003c.29.425.568.876.83 1.323.263.446.505.913.722 1.37a19.744 19.744 0 01-1.55 2.709c-1.042.08-2.09.08-3.132-.004-.295-.429-.573-.87-.833-1.321a20.544 20.544 0 01-.714-1.37h-.007v-.002zm5.753-2.586c.476.067.937.152 1.372.254-.134.447-.288.888-.462 1.322a25.5 25.5 0 00-.903-1.576h-.007zm.483 4.363c.15-.265.294-.53.431-.793.175.455.35.903.473 1.341-.459.106-.921.19-1.387.253.17-.259.332-.526.49-.801h-.007zm-3.122-6.449c.315.336.625.7.927 1.091-.305-.013-.61-.02-.915-.021-.31 0-.626 0-.933.021.29-.378.597-.742.92-1.09zm-3.883-2.101a.852.852 0 01.432-.098 2.3 2.3 0 01.909.23 6.838 6.838 0 011.75 1.186l.206.188a17.189 17.189 0 00-1.43 1.75c-.745.073-1.484.194-2.214.362a8.895 8.895 0 01-.175-.993c-.182-1.322.028-2.33.52-2.618l.002-.007zm-.927 8.877c-.328-.1-.652-.218-.97-.35-1.242-.525-2.013-1.2-2.013-1.776 0-.576.774-1.246 2.016-1.763.311-.129.629-.242.952-.34.218.726.486 1.436.798 2.126a17.302 17.302 0 00-.783 2.103zm4.027 3.344c-1.434 1.283-2.33 1.42-2.65 1.42a.822.822 0 01-.424-.102c-.5-.286-.7-1.292-.54-2.626.04-.34.098-.678.174-1.012.726.167 1.461.287 2.202.36.441.62.923 1.21 1.443 1.765l-.204.195zm.8-.79a15.73 15.73 0 01-.93-1.09c.306.013.612.02.918.02.31 0 .627 0 .933-.019-.303.389-.61.753-.922 1.089h.001zm3.884 2.101a.845.845 0 01-.434.104c-.32 0-1.226-.14-2.654-1.419l-.206-.188c.514-.55.99-1.136 1.427-1.75a16.97 16.97 0 002.217-.361c.077.34.138.672.175.993.173 1.32-.028 2.328-.527 2.614l.002.007zm1.89-4.98a10.8 10.8 0 01-.952.34 17.233 17.233 0 00-.8-2.127c.308-.682.57-1.384.786-2.1.33.1.652.216.97.35 1.241.524 2.013 1.199 2.012 1.775-.002.576-.774 1.239-2.017 1.756l.001.007zm-5.791-.178a1.607 1.607 0 10.003-3.214 1.607 1.607 0 00-.003 3.214zM8.804 29.966v-19.38l-.84.841v19.374h21.369l.837-.835H8.804z" fill="#09D3AC"></path>
              </svg>
              </span>
          </a>
          <a class="grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="#">
              <span class="my-6 grid h-24 w-24 place-items-center">
              <svg class="mx-auto" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M29.397 26.388c.213 2.733.213 4.014.213 5.412h-6.322c0-.305.005-.583.01-.866.018-.878.036-1.794-.107-3.643-.188-2.708-1.354-3.31-3.497-3.31H9.75v-4.926h10.244c2.708 0 4.063-.823 4.063-3.005 0-1.917-1.355-3.08-4.063-3.08H9.75V8.15h11.373c6.13 0 9.177 2.896 9.177 7.521 0 3.46-2.144 5.716-5.04 6.092 2.445.489 3.874 1.88 4.137 4.625z" fill="#121212"></path>
                  <path d="M9.75 31.8v-3.672h6.685c1.116 0 1.359.828 1.359 1.322v2.35H9.75z" fill="#121212"></path>
              </svg>
              </span>
          </a>
          <a class="grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="#">
              <span class="my-6 grid h-24 w-24 place-items-center">
              <svg class="mx-auto" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M31.881 11.61L20.886 31.563a.593.593 0 01-1.04.004L8.633 11.611c-.251-.446.125-.987.624-.897l11.007 1.997a.59.59 0 00.212 0l10.777-1.994c.497-.092.875.445.628.893z" fill="url(#vite_svg__paint0_linear_41_6732)"></path>
                  <path d="M25.506 8.096l-8.137 1.618a.302.302 0 00-.241.28l-.5 8.578a.3.3 0 00.365.314l2.265-.531c.212-.05.404.14.36.356l-.673 3.345a.3.3 0 00.38.35l1.399-.43a.3.3 0 01.38.35l-1.07 5.255c-.067.328.364.507.543.226l.12-.189 6.63-13.428c.111-.225-.08-.481-.323-.433l-2.332.456a.301.301 0 01-.344-.381l1.522-5.355a.301.301 0 00-.345-.381z" fill="url(#vite_svg__paint1_linear_41_6732)"></path>
                  <defs>
                  <linearGradient id="vite_svg__paint0_linear_41_6732" x1="8.359" y1="10.001" x2="22.306" y2="28.665" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#41D1FF"></stop>
                      <stop offset="1" stop-color="#BD34FE"></stop>
                  </linearGradient>
                  <linearGradient id="vite_svg__paint1_linear_41_6732" x1="19.631" y1="8.535" x2="22.178" y2="25.757" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FFEA83"></stop>
                      <stop offset="0.083" stop-color="#FFDD35"></stop>
                      <stop offset="1" stop-color="#FFA800"></stop>
                  </linearGradient>
                  </defs>
              </svg>
              </span>
          </a>
          <a class="grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="#">
              <span class="my-6 grid h-24 w-24 place-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 1280 1280" fill="none" class="mx-auto">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M815.039 94.6439C824.758 106.709 829.714 122.99 839.626 155.553L1056.17 866.901C976.107 825.368 889.072 795.413 797.281 779.252L656.29 302.798C653.983 295.002 646.822 289.654 638.693 289.654C630.542 289.654 623.368 295.03 621.08 302.853L481.795 779.011C389.579 795.1 302.146 825.109 221.741 866.793L439.347 155.388L439.348 155.388C449.291 122.882 454.262 106.629 463.982 94.5853C472.562 83.9531 483.723 75.6958 496.4 70.6002C510.76 64.8284 527.756 64.8284 561.749 64.8284H717.174C751.212 64.8284 768.23 64.8284 782.603 70.6123C795.292 75.7184 806.459 83.9923 815.039 94.6439Z" fill="url(#paint0_linear_709_110)"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M840.951 900.754C805.253 931.279 734.002 952.097 651.929 952.097C551.197 952.097 466.767 920.737 444.363 878.561C436.354 902.732 434.558 930.396 434.558 948.068C434.558 948.068 429.281 1034.84 489.636 1095.2C489.636 1063.86 515.042 1038.46 546.381 1038.46C600.097 1038.46 600.036 1085.32 599.987 1123.34C599.986 1124.48 599.984 1125.61 599.984 1126.73C599.984 1184.44 635.255 1233.91 685.416 1254.77C677.924 1239.36 673.721 1222.05 673.721 1203.77C673.721 1148.73 706.034 1128.23 743.588 1104.41L743.588 1104.41C773.469 1085.46 806.668 1064.41 829.548 1022.17C841.486 1000.13 848.265 974.893 848.265 948.068C848.265 931.573 845.702 915.676 840.951 900.754Z" fill="#FF5D01"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M840.951 900.754C805.253 931.279 734.002 952.097 651.929 952.097C551.197 952.097 466.767 920.737 444.363 878.561C436.354 902.732 434.558 930.396 434.558 948.068C434.558 948.068 429.281 1034.84 489.636 1095.2C489.636 1063.86 515.042 1038.46 546.381 1038.46C600.097 1038.46 600.036 1085.32 599.987 1123.34C599.986 1124.48 599.984 1125.61 599.984 1126.73C599.984 1184.44 635.255 1233.91 685.416 1254.77C677.924 1239.36 673.721 1222.05 673.721 1203.77C673.721 1148.73 706.034 1128.23 743.588 1104.41L743.588 1104.41C773.469 1085.46 806.668 1064.41 829.548 1022.17C841.486 1000.13 848.265 974.893 848.265 948.068C848.265 931.573 845.702 915.676 840.951 900.754Z" fill="url(#paint1_linear_709_110)"></path>
                  <defs>
                  <linearGradient id="paint0_linear_709_110" x1="882.997" y1="27.1132" x2="638.955" y2="866.902" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#000014"></stop>
                      <stop offset="1" stop-color="#150426"></stop>
                  </linearGradient>
                  <linearGradient id="paint1_linear_709_110" x1="1001.68" y1="652.45" x2="790.326" y2="1094.91" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#FF1639"></stop>
                      <stop offset="1" stop-color="#FF1639" stop-opacity="0"></stop>
                  </linearGradient>
                  </defs>
              </svg>
              </span>
          </a>
          <a class="grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="#">
              <span class="my-6 grid h-24 w-24 place-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 128 128"><path fill="#9B4F96" d="M115.4 30.7L67.1 2.9c-.8-.5-1.9-.7-3.1-.7c-1.2 0-2.3.3-3.1.7l-48 27.9c-1.7 1-2.9 3.5-2.9 5.4v55.7c0 1.1.2 2.4 1 3.5l106.8-62c-.6-1.2-1.5-2.1-2.4-2.7"/><path fill="#68217A" d="M10.7 95.3c.5.8 1.2 1.5 1.9 1.9l48.2 27.9c.8.5 1.9.7 3.1.7c1.2 0 2.3-.3 3.1-.7l48-27.9c1.7-1 2.9-3.5 2.9-5.4V36.1c0-.9-.1-1.9-.6-2.8z"/><path fill="#fff" d="M85.3 76.1C81.1 83.5 73.1 88.5 64 88.5c-13.5 0-24.5-11-24.5-24.5s11-24.5 24.5-24.5c9.1 0 17.1 5 21.3 12.5l13-7.5c-6.8-11.9-19.6-20-34.3-20c-21.8 0-39.5 17.7-39.5 39.5s17.7 39.5 39.5 39.5c14.6 0 27.4-8 34.2-19.8zM97 66.2l.9-4.3h-4.2v-4.7h5.1L100 51h4.9l-1.2 6.1h3.8l1.2-6.1h4.8l-1.2 6.1h2.4v4.7h-3.3l-.9 4.3h4.2v4.7h-5.1l-1.2 6h-4.9l1.2-6h-3.8l-1.2 6h-4.8l1.2-6h-2.4v-4.7H97zm4.8 0h3.8l.9-4.3h-3.8z"/></svg>
              </span>
          </a>
          
          <a class="grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="#">
              <span class="my-6 grid h-24 w-24 place-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 28 28" focusable="false">
                  <title>Gatsby</title>
                  <circle cx="14" cy="14" r="14" fill="#639"></circle>
                  <path fill="#fff" d="M6.2 21.8C4.1 19.7 3 16.9 3 14.2L13.9 25c-2.8-.1-5.6-1.1-7.7-3.2zm10.2 2.9L3.3 11.6C4.4 6.7 8.8 3 14 3c3.7 0 6.9 1.8 8.9 4.5l-1.5 1.3C19.7 6.5 17 5 14 5c-3.9 0-7.2 2.5-8.5 6L17 22.5c2.9-1 5.1-3.5 5.8-6.5H18v-2h7c0 5.2-3.7 9.6-8.6 10.7z"></path>
              </svg>
              </span>
          </a>
          
          <a class="grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="#">
              <span class="my-6 grid h-24 w-24 place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 256 256"><path fill="#512BD4" d="M0 0h256v256H0z"/><path fill="#FFF" d="M45.627 163.555c-1.81 0-3.348-.603-4.615-1.809c-1.267-1.237-1.901-2.707-1.901-4.408c0-1.732.634-3.216 1.9-4.454c1.268-1.237 2.806-1.856 4.616-1.856c1.84 0 3.394.619 4.661 1.856c1.298 1.238 1.946 2.722 1.946 4.454c0 1.701-.648 3.17-1.946 4.408c-1.267 1.206-2.82 1.81-4.66 1.81m72.361-1.02h-11.765L75.225 113.63a21.882 21.882 0 0 1-1.946-3.85h-.272l.047.305l.043.35l.04.393l.038.436l.049.736l.042.832l.035.93l.028 1.028l.02 1.125l.01.805l.01 2.2v43.614H62.961V96h12.535l29.957 47.743l.74 1.169l.477.768l.408.675l.34.583l.19.338l.16.296l.13.255h.18l-.034-.21l-.064-.45l-.06-.493l-.053-.537a35.943 35.943 0 0 1-.024-.285l-.046-.602l-.04-.645l-.035-.69l-.042-1.114l-.03-1.212l-.018-1.31l-.006-1.407V96h10.362zm50.685 0h-36.428V96h34.98v9.373h-24.21v18.837h22.31v9.326h-22.31v19.673h25.658zm51.772-57.162H201.8v57.162h-10.77v-57.162h-18.6V96h48.014z"/></svg>
              </span>
          </a>
          
          <a class="grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="#">
              <span class="my-6 grid h-24 w-24 place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="90" height="61.35" viewBox="0 0 512 349"><path fill="#00758F" d="m152.31 230.297l15.56 50.487c3.496 11.463 4.954 19.465 4.37 24.026c8.51-22.792 14.456-47.63 17.839-74.513h18.71c-8.045 43.766-18.656 75.57-31.827 95.41c-10.262 15.289-21.504 22.933-33.746 22.933c-3.264 0-7.288-.986-12.063-2.944v-10.55c2.333.342 5.07.525 8.218.525c5.711 0 10.314-1.583 13.816-4.742c4.193-3.849 6.292-8.175 6.292-12.97c0-3.274-1.637-9.993-4.896-20.157l-21.68-67.505zM33.223 199.266l28.5 86.956h.176l28.675-86.956h23.428c5.13 43.124 8.16 82.581 9.09 118.346H103.34c-.695-33.433-2.62-64.871-5.768-94.32H97.4l-30.078 94.32H52.28l-29.896-94.32h-.176c-2.218 28.282-3.614 59.72-4.196 94.32H0c1.164-42.08 4.077-81.525 8.739-118.346z"/><path fill="#F29111" d="M352.498 197.51c30.657 0 45.986 19.586 45.986 58.739c0 21.276-4.61 37.347-13.821 48.204c-1.66 1.984-3.495 3.698-5.427 5.286l21.695 10.727l-.021-.001l-7.703 13.302l-28.253-16.485c-4.683 1.387-9.836 2.08-15.451 2.08c-15.053 0-26.297-4.387-33.731-13.15c-8.16-9.694-12.238-24.955-12.238-45.757c0-21.156 4.602-37.166 13.816-48.037c8.392-9.944 20.11-14.909 35.148-14.909m-93.88.172c10.957 0 20.92 2.932 29.894 8.775l-4.558 10.157c-7.679-3.264-15.25-4.903-22.716-4.903c-6.058 0-10.726 1.458-13.98 4.392c-3.272 2.908-5.296 6.65-5.296 11.212c0 7.01 4.994 13.089 14.215 18.225a816.32 816.32 0 0 1 9.031 5.011l.688.387l.345.194l.689.387l.344.194l.688.388c6.98 3.935 13.548 7.691 13.548 7.691c9.22 6.545 13.816 13.523 13.816 25.016c0 10.037-3.678 18.276-11.01 24.723c-7.337 6.418-17.194 9.636-29.538 9.636c-11.545 0-22.734-3.704-33.572-11.05l5.07-10.166c9.327 4.675 17.767 7.01 25.346 7.01c7.108 0 12.672-1.587 16.697-4.721c4.017-3.157 6.424-7.56 6.424-13.143c0-7.027-4.888-13.034-13.855-18.073a897.982 897.982 0 0 1-8.395-4.697l-.687-.389c-1.262-.713-2.533-1.435-3.778-2.142l-.675-.384c-6.055-3.444-11.29-6.453-11.29-6.453c-8.964-6.557-13.459-13.592-13.459-25.184c0-9.587 3.352-17.336 10.046-23.231c6.71-5.908 15.367-8.862 25.968-8.862m175.895 1.584v103.788h37.238v14.558h-56.124V199.266zm57.93 103.833v2.46h-4.094v12.04h-3.13v-12.04h-4.253v-2.46zm7.56 0l3.931 9.884l3.611-9.884h4.437v14.5h-2.95v-11.035l-4.11 11.035h-2.127l-4.117-11.035h-.158v11.035h-2.791v-14.5zM350.57 212.064c-18.066 0-27.104 14.91-27.104 44.71c0 17.07 2.395 29.448 7.176 37.163c4.428 7.14 11.363 10.703 20.806 10.703c18.066 0 27.103-15.026 27.103-45.064c0-16.831-2.395-29.103-7.17-36.822c-4.433-7.124-11.365-10.69-20.81-10.69"/><path fill="#00758F" d="M303.218 7.333c5.993-14.726 26.948-3.574 35.08 1.57c1.993 1.287 4.279 4.006 6.564 5.011c3.565.14 7.127.419 10.698.568c6.698 1.574 12.972 2.86 18.25 5.866c24.528 14.445 40.495 29.165 55.19 53.479c3.14 5.15 4.709 10.723 7.274 16.296c3.56 8.307 7.56 17.027 11.692 24.882c1.85 3.724 3.281 7.865 5.85 11.01c1.003 1.438 3.852 1.862 5.555 2.721c4.708 2.437 10.412 4.287 14.84 7.147c8.269 5.156 16.264 11.3 23.532 17.59c2.709 2.428 4.555 5.865 7.136 8.433v1.296c-2.291.703-4.574 1.423-6.859 2c-4.991 1.282-9.412.992-14.254 2.275c-2.992.868-6.707 2.013-9.845 2.304l.29.292c1.846 5.275 11.834 9.565 16.402 12.72c5.548 4.004 10.689 8.86 14.827 14.437c1.429 1.423 2.858 2.718 4.28 4.137c.994 1.438 1.274 3.298 2.28 4.58v.434c-1.114-.393-1.915-1.143-2.674-1.927l-.453-.473c-.453-.47-.91-.932-1.431-1.313c-3.148-2.15-6.274-4.722-9.422-6.721c-5.412-3.434-11.689-5.427-17.246-8.874c-3.142-2.001-6.137-4.28-9.132-6.57c-2.715-2.007-5.705-5.861-7.411-8.721c-1.005-1.58-1.143-3.437-2.291-4.58c.205-1.909 1.954-2.476 3.719-2.942l.406-.107c.609-.158 1.205-.316 1.725-.525c7.414-3.148 16.253-4.29 27.667-4.004c-.43-2.866-7.562-6.437-9.839-8.153c-4.57-3.294-9.409-6.731-14.257-9.729c-2.569-1.57-6.996-2.716-9.842-3.999c-3.851-1.574-12.41-3.147-14.544-6.145c-3.625-4.726-6.229-10.363-8.757-16.057l-.688-1.554a803.85 803.85 0 0 0-.69-1.553c-2.988-6.857-6.7-14.006-9.695-21.027c-1.566-3.425-2.285-6.431-4-9.716c-10.407-20.158-25.81-37.035-44.485-48.904c-6.137-3.862-12.98-7.436-20.534-9.865c-4.281-1.293-9.419-.578-13.98-1.57h-3.002c-2.562-.722-4.701-3.438-6.7-4.87c-4.415-2.998-8.837-5.011-14.117-7.15c-1.85-.858-7.133-2.856-8.977-1.283c-1.142.287-1.721.718-2.002 1.864c-1.136 1.71-.137 4.286.57 5.863c2.142 4.57 5.134 7.286 7.85 11.148c2.416 3.425 5.417 7.287 7.13 11.011c3.696 8.005 5.417 16.874 8.842 24.878c1.27 3.01 3.279 6.435 5.128 9.15c1.567 2.155 4.416 3.713 5.278 6.441c1.718 2.86-2.572 12.297-3.565 15.294c-3.715 11.727-2.995 28.028 1.283 38.193l.228.536l.228.543c1.562 3.723 3.234 7.732 7.387 8.773c.286-.284 0-.135.567-.284c1.005-7.868 1.288-15.445 4-21.601c1.567-3.849 4.696-6.57 6.841-9.712c1.43.856 1.43 3.437 2.282 5.145c1.856 4.43 3.849 9.287 6.137 13.73c4.696 9.15 9.98 18.021 15.967 26.025c2.005 2.859 4.85 6.006 7.416 8.581c1.143.997 2.423 1.573 3.282 2.856h.28v.432c-4.278-1.577-6.99-6.003-10.402-8.587c-6.424-4.857-14.117-12.151-18.545-19.15c-1.852-4.018-3.854-7.869-5.85-11.867v-.289c-.853 1.142-.567 2.276-.994 4.004c-1.852 7.145-.426 15.296-6.843 17.866c-7.274 3.01-12.7-4.857-14.977-8.432c-7.276-11.866-9.269-31.884-4.138-48.043c1.14-3.577 1.295-7.867 3.285-10.723c-.43-2.582-2.42-3.288-3.571-4.87c-1.996-2.704-3.705-5.854-5.268-8.857c-3.002-5.866-5.138-12.875-7.417-19.166c-1.002-2.569-1.289-5.148-2.288-7.58c-1.704-3.712-4.845-7.436-7.268-10.72c-3.281-4.72-12.837-13.868-8.985-23.168m46.772 28.015c.381.382.841.716 1.317 1.045l.574.394c.765.53 1.506 1.088 1.96 1.848c.72 1.006.854 1.999 1.716 3.007c0 3.437-.996 5.722-3.007 7.146c0 0-.137.15-.278.29c-1.14-2.291-2.139-4.57-3.287-6.859c-1.414-1.998-3.413-3.583-4.565-5.866h-.277v-.287c1.721-.425 3.428-.718 5.847-.718"/></svg>
              </span>
          </a>
          
          <a class="grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="#">
              <span class="my-6 grid h-24 w-24 place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 128 128"><path fill="#5c2d91" d="M127.352 43.199c-5.727 35.891-36.562 62.379-72.902 62.633a54.053 54.053 0 0 1-10.656-.648c-15.18-2.574-26.496-15.402-27.16-30.785c.125-17.336 14.148-31.359 31.488-31.484S79.68 56.617 80.047 73.953c.129 5.254-2.145 9.871-6.824 10c-5 0-7.344-3.57-7.344-8.379V62.215a8.183 8.183 0 0 0-8.117-8.191H46.559c-8.977-.062-16.832 6.012-19.035 14.715s1.824 17.781 9.75 21.996a19.5 19.5 0 0 0 23.688-4.223l.391-.582l.391.645a13.795 13.795 0 0 0 11.762 5.602A15.54 15.54 0 0 0 87.902 75.93a42.175 42.175 0 0 0-1.16-10.328a39.57 39.57 0 0 0-42.969-30.926C23.645 36.879 8.43 53.922 8.512 74.168c.262 21.543 17.512 39.023 39.047 39.566c0 0 2.93.266 6.242.195a84.49 84.49 0 0 0 45.289-13.516c.191-.125.383.129.254.328a66.49 66.49 0 0 1-51.785 21.18A46.734 46.734 0 0 1 0 73.977a48.37 48.37 0 0 1 19.426-38.73a47.38 47.38 0 0 1 27.941-9.223h15.031a42.29 42.29 0 0 0 31.203-13.777a.59.59 0 0 1 .68-.141a.598.598 0 0 1 .359.598a42.378 42.378 0 0 1-6.562 18.969a.583.583 0 0 0 .051.633a.58.58 0 0 0 .598.215a45.45 45.45 0 0 0 31.602-26.055a.8.8 0 0 1 1.367 0a57.58 57.58 0 0 1 5.656 36.734zM46.52 61.824c-6.422 0-11.633 5.207-11.633 11.633A11.64 11.64 0 0 0 46.52 85.09c6.426 0 11.633-5.211 11.633-11.633V62.602a.84.84 0 0 0-.801-.801zm0 0"/></svg>
            </span>
          </a> -->
          <?php 
        $tt = new TutorialService($pdo);
        $tutorial = $tt->getAllTutorials();
        foreach ($tutorial as $tutorial) { ?>
            <a class="grid w-full min-w-1/3 transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25" href="#">
              <img src="<?php echo $tutorial->getImage() ?>"/>
          </a>
        <?php
        }
    ?>
          
          </div>
      </div>
  </div>
</div>
</body>