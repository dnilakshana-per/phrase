<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Phrase Analyser</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap-4.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
        function confirmMessage() {
            var result = confirm("Want to Reset?");
            if (result) {
                window.location.href ='reset/index';
            }
        }
    </script>
</head>
<body>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Phrase Analyser</h1>
</div>
<form action="phrase/execute" method="post" id="draft-form">
    <div class="container">
        <?php $session = new \libs\Session(); ?>
        <?php
        $errorStatus  = $session->getValue('error');
        $errorMessage = $session->getValue('message');
        $session->setValue('error', false);
        $session->setValue('message', '');
        ?>
        <?php if($errorStatus) { ?>
        <div class="alert alert-danger" role="alert">
            <strong>Error!</strong> <?php echo $errorMessage?>.
        </div>
        <?php } ?>
        <div class="card-deck mb-3 text-center">

         <div class="card mb-4 shadow-sm">

             <div class="card-body">
                <input type="text" class="form-control" value="<?php echo $session->getValue('string'); ?>" name="string"  maxlength="255" required />
                <p>Enter String to Analyze. (String should not exceed 255 characters)</p>
                <div class="row">
                    <div class="col-lg-6"><input type="submit" class="btn btn-lg btn-block btn-primary" value="Analyze"></div>
                    <div class="col-lg-6"><button type="button" class="btn btn-lg btn-block btn-primary" onclick="confirmMessage();">Reset</button></div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'views/analyze/grid.php'; ?>
</div>
</form>
</body>
</html>