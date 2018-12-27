<?php
use app\assets\MathAsset;
use yii\helpers\Html;

MathAsset::register($this);
/* @var $this yii\web\View */

$this->title = \karmakarpatrick\mathnotepad\MathNotepad::widget();

?>
<!--<script src="http://localhost/extensions/yiiextensions/web/js/math.min.js"></script>-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">
                    Math Notepad
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        Evaluate
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <?=
                                    Html::textarea('_evaluate', null, ['class' => 'form form-control', 'rows' => 6, 'id' => 'evaluate']);
                                    echo '<p style="color:red;font-weight:bold" id="error"></p>';
                                    echo '<br>' . Html::button('Expressions', ['class' => 'btn btn-block btn-primary', 'onclick' => "evaluateD()"]);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <button class="btn btn-primary" onclick="Export2Doc('exportContent', '<?= time(); ?>');">Result's, Export as .doc</button>

                                    </div>
                                </div>
                                <div class="panel-body" style="height: 500px;overflow: auto" id="exportContent">
                                    <p style="color:red;font-weight:bold" id="result"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // use the math.js libary
    function evaluateD() {
        document.getElementById("error").innerHTML = '';
        var a = document.getElementById('evaluate').value;
        try {
            var data = eval(a);
            var str = document.getElementById('evaluate').value;
             document.getElementById("result").innerHTML += str+'<p style="color:green;font-weight:bold">'+data+'</p><hr/>';
        } catch (err) {
            document.getElementById("error").innerHTML = err.message;
        }
    }

    function Export2Doc(element, filename = ''){
        var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word'><head><meta charset='utf-8'><title></title></head><body>";
        var postHtml = "</body></html>";
        var html = preHtml+document.getElementById(element).innerHTML+postHtml;

        var blob = new Blob(['\ufeff', html], {
            type: 'application/msword'
        });

        // Specify link url
        var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
        var filename = prompt("Enter The Document Name:", "<?= time();?>");
        if (filename == null || filename == "") {
            txt = "You cancelled the download.";
        } else {
            // Specify file name
            filename = filename?filename +'.doc':'document.doc';
            // Create download link element
            var downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if(navigator.msSaveOrOpenBlob ){
                navigator.msSaveOrOpenBlob(blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = url;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }

            document.body.removeChild(downloadLink);
        }

    }

</script>