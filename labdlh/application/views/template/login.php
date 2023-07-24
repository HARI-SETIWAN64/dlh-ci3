<!doctype HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url()?>template/login2/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>template/login2/css/material.blue-deep_purple.min.css" />
    <link href="<?php echo base_url()?>template/login2/fonts/fontello/css/fontello.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url()?>template/login2/css/bootstrap-offset-right.css">
    <link rel="stylesheet" href="<?php echo base_url()?>template/login2/css/style.css">
    <title>Simpling</title>
    <style>
        .mdl-textfield__label {
            margin-bottom: 0;
            color: #134a58;
            font-weight: normal;
        }
        
        .mdl-textfield--floating-label.is-focused .mdl-textfield__label,
        .mdl-textfield--floating-label.is-dirty .mdl-textfield__label {
            text-transform: uppercase
        }
        
        .has-feedback label~.form-control-feedback {
            top: 15px;
        }
        
        .mdl-textfield {
            width: 100%;
        }
        
        .mdl-checkbox__label {
            cursor: text;
            font-size: 13px;
            float: left;
            color: #b0b3b4;
            font-weight: normal;
        }
        
        .mdl-checkbox__box-outline {
            border: 1px solid #b0b3b4;
        }
        
        .mdl-textfield__input {
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, .12);
            display: block;
            font-size: 16px;
            margin: 0;
            padding: 4px 0;
            width: 100%;
            background: 0 0;
            text-align: left;
            color: inherit;
            font-weight: bold;
        }
        
        .mdl-switch__label {
            float: left;
            font-weight: normal;
            color: #b0b3b4;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <?php echo $this->template->content; ?>

    <script src="<?php echo base_url()?>template/login2/node_modules/jquery/dist/jquery.min.js "></script>
    <script src="<?php echo base_url()?>template/login2/node_modules/bootstrap/dist/js/bootstrap.min.js "></script>
    <script src="<?php echo base_url()?>template/login2/libs/mdl/material.min.js "></script>
    <script src="<?php echo base_url()?>template/login2/js/jquery.validate.min.js "></script>

    <script>
        //Form validation.
        $('form').validate({
            rules: {
                fname: {
                    minlength: 3,
                    maxlength: 15,
                }
            },
            errorPlacement: function(error, element) {},
            highlight: function(element) {
                var id_attr = "#" + $(element).attr("id") + "1";
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                $(id_attr).removeClass('icon-ok-circled2').addClass('icon-cancel-circled2');
            },
            unhighlight: function(element) {
                var id_attr = "#" + $(element).attr("id") + "1";
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                $(id_attr).removeClass('icon-cancel-circled2').addClass('icon-ok-circled2');
            },
        });
    </script>

</body>

</html>