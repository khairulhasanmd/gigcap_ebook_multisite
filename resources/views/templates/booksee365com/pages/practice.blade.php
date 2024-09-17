
<section>
    <div id="spinner" style=" width: 100%; height: 100%; position: absolute; left: 0; top: 0; right: 0; bottom: 0;">
        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
            <img src="https://files.fieryx.com/code-camp/spinner.gif" />
        </div>
    </div>
    <iframe src="{{$url}}" frameborder="0" id="practice-iframe" width="100%" height="100%" style="min-height: 1014px;display: flex; justify-content: center; align-items: center;" onload="document.getElementById('spinner').style.display='none';"></iframe>
</section>
