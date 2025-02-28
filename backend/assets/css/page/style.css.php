<style>
 html {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Sarabun", sans-serif;
    font-weight: 300;
    font-style: normal;
    overflow: hidden; 
}
body {
    /*background: linear-gradient(to bottom, #FF69B4, #1a1917) no-repeat center fixed;*/
    background: no-repeat center fixed;
    background-size: cover;
    background-attachment: scroll;
    display: flex;
    justify-content: center;
    align-items: /**/;
    min-height: 100vh;
    margin: 0 auto;
    overflow: hidden; 
}
button {
    width: auto;
}
#btnFG,#btnAD {
 width: 100%;
}
  img {
   width: 100%;
   height: 75px;
   max-width: 75px;
   border-radius: 50%;
   filter: drop-shadow(0 0 0.30rem black) contrast(120%);
   margin: 2px 2px 15px 2px;
   pointer-events: none;
  }

.footer {
    user-select: none;
}
.adminForm {
    width: 500px;
    max-width: 920px;
    margin-left: 5px;
    margin-right: 5px;
    padding: 2px;
    padding-top: 100px;
}
.container {
    
}
.card {
    box-shadow: 2px 0 10px 1px #000;
}
::-webkit-scrollbar {
    display: none;
}

.video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden; 
    z-index: -1; 
}
.bg-video {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>