<div id="preloader_malc">

    <div>

        <img src="/images/load.gif">

    </div>

</div>

<style type="text/css">
    #preloader_malc {
        position: fixed;
        height:100%;
        width:100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #00FFFF;
        z-index: 10000;
    }
    #preloader_malc div {
        width: 200px;
        height: 200px;
        line-height: 40px;
        border-radius: 8px;
        font-family: arial;
        font-size: 25px;
        color: #FFFFFF;
        text-align: center;
        box-shadow: 0 2px 6px #00FFFF;
        position: relative;
        z-index: 999;
        top: calc(50% - 100px);
        left: calc(50% - 100px);
    }
    #preloader_malc div img{
        width:100%;
        height:100%;
    }
</style>

<script type="text/javascript">
    window.onload = function() {
        setTimeout(function() {
            document.getElementById("preloader_malc").style.display = "none";
        }, 2800);
    };
</script>