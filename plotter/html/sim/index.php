<?php
    include_once '../../../db.php';
    session_start();

    $uid = $_SESSION['id'];

    $sql2 = "SELECT * FROM token ORDER BY ttoken ASC";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    
    $time = (int)$row2['ttoken'];
    $filename= $time.".gcode";

    //header('Content-type: test/plain');
    $file = "./test.gcode";
    $file_content = file_get_contents($file);
    $gcode = explode("\n",$file_content);
    $gcode = array_slice($gcode, 4);
?>

<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="chrome=1"/>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>

    <link rel="icon" type="image/gif" href="../../uploads/nitk.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/btheme.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <title>NITK</title>
    <script src="webapp/libs/require.js"></script>
    <script src="webapp/config.js"></script>
    <script>
        requirejs.config({
            baseUrl: 'webapp'
        });
    </script>

    <link rel="shortcut icon" href="webapp/images/icon_fraise_48.png"/>
    <link rel="stylesheet" href="webapp/twoDView.css" type="text/css">
    <link rel="stylesheet" href="webapp/threeDView.css" type="text/css">
    <style>

        body, html {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            position: absolute;
            height: 100%;
            width: 100%;
            margin: 0;
        }

        body {
            padding-left: 8px;
            padding-right: 8px;
        }

        h1 {
            margin-top: 0;
        }

        .editBlock {
            position: relative;
            float: left;
            width: 39%;
            height: 400px;
            padding: 1px;
            margin: 0;
        }

        .editBlock pre {
            width: 100%;
            height: 350px;
            margin: 0;
        }

        .viewContainer {
            float: right;
            width: 58%;
        }

        #loader {
            display: inline-block;
            background-size: 100% 100%;
            background-image: url(webapp/images/spinner.svg);
            width: 20px;
            height: 20px;
        }

        .boundsTable {
            border-collapse: collapse;
        }

        .boundsTable td {
            border: dashed gray 1px;
            padding: 3px;
        }

        .ThreeDView {
            border: solid gray 1px;
            background: #000;
            height: 400px;
            position: relative;
        }

        .TwoDView {
            border: solid gray 1px;
            background: #000;
            height: 400px;
        }

        #app {
            margin-top: 50px;
            position: relative;
        }

        .plotb{
            border-radius: 10px;
            margin-left: 43%;
            margin-top: 30px;
            border:solid 2px #f13c20;
            margin-top: 10px;
            margin-bottom: 20px;
            font-weight:bold;
            background-color: #f13c20;
            width:150px;
            height: 60px;
            color:white;
            cursor:pointer;
        }

        h1{
            color: #00cc00;
            font-family: 'Oswald', sans-serif;
        }

        #save , .save {
            width: 120px;
            height: 45px;
            margin-bottom: 10px;
            margin-left: 44%;
            padding: 10px 10px 10px 10px;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            border: solid 2px #0000b3;
            background-color:#1a1aff;
            cursor:pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h1 align="center">G-Code simulator</h1>

<div class="plot container">
    <form action="../plotter.php" enctype="multipart/form-data" method="POST">
    <span class="row">
        <a class="col-lg-3 col-lg-offset-3" href="./test.gcode" id="save" download="<?php echo $filename; ?>"> Save G-code </a><br>
        <button class="col-lg-3 plotb" type="submit" value="PLOT" id="plotbutton">PLOT </button>
        <input type="text" name="times" style="display:none;" value="<?php echo $time; ?>">
    </span>
    </form>
</div>

<div id="app">

</div>

<script id="demoCode" type="application/gcode">    
</script>

<!-- ///////////////////////////////////// my script code ///////////////////////////////////////// -->
<script>
    function show(){
        document.getElementById("plotbutton").style.display = "block";
    }

    window.onload = function(){
        alert("Please SAVE the file before plotting");
    }
</script>

<script>
    require(['Ember', 'cnc/ui/graphicView', 'cnc/cam/cam', 'cnc/util', 'cnc/ui/gcodeEditor', 'cnc/gcode/gcodeSimulation', 'templates'],
            function (Ember, GraphicView, cam, util, gcodeEditor, gcodeSimulation) {
                var demoCode1 = `<?php echo implode("\n",$gcode); ?>`;
                //console.log(demoCode1);
                $('#demoCode').text(demoCode1);
                var demoCode = $('#demoCode').text();
                
                Ember.Handlebars.helper('num', function (value) {
                    return new Handlebars.SafeString(Handlebars.Utils.escapeExpression(util.formatCoord(value)));
                });
                Ember.TEMPLATES['application'] = Ember.TEMPLATES['camApp'];

                window.Simulator = Ember.Application.create({
                    rootElement: '#app'
                });

                Simulator.GcodeEditorComponent = gcodeEditor.GcodeEditorComponent;
                Simulator.GraphicView = GraphicView;

                Simulator.ApplicationController = Ember.ObjectController.extend({
                    init: function () {
                        this._super();
                        var _this = this;
                        $(window).on('dragover', function (event) {
                            event.preventDefault();
                            event.dataTransfer.dropEffect = 'move';
                        });

                        $(window).on('drop', function (evt) {
                            evt.preventDefault();
                            evt.stopPropagation();
                            var files = evt.dataTransfer.files;
                            var file = files[0];
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                _this.set('code', e.target.result);
                                _this.launchSimulation();
                            };
                            reader.readAsText(file);
                        });
                        this.launchSimulation();
                    },
                    actions: {
                        simulate: function () {
                            this.launchSimulation();
                        },
                        loadBigSample: function () {
                            this.set('computing', true);
                            var _this = this;
                            require(['text!samples/aztec_calendar.ngc'], function (text) {
                                _this.set('code', text);
                                _this.launchSimulation();
                            });
                        }
                    },
                    launchSimulation: function () {
                        var _this = this;

                        function handleResult(result) {
                            _this.flushFragmentFile();
                            var errors = [];
                            for (var i = 0; i < result.errors.length; i++) {
                                var error = result.errors[i];
                                errors.push({row: error.lineNo, text: error.message, type: "error"});
                            }
                            _this.set('errors', errors);
                            _this.set('bbox', {min: result.min, max: result.max});
                            _this.set('totalTime', result.totalTime);
                            _this.set('lineSegmentMap', result.lineSegmentMap);
                            _this.set('computing', false);
                            console.timeEnd('simulation');
                        }

                        console.time('simulation');
                        this.set('computing', true);
                        _this.set('lineSegmentMap', []);
                        this.get('simulatedPath').clear();
                        gcodeSimulation.parseInWorker(this.get('code'), new util.Point(0, 0, 0),
                                Ember.run.bind(_this, handleResult),
                                Ember.run.bind(_this, function (fragment) {
                                    _this.get('fragmentFile').pushObject(fragment);
                                    Ember.run.throttle(_this, _this.flushFragmentFile, 500);
                                }));
                    },
                    flushFragmentFile: function () {
                        this.get('simulatedPath').pushObjects(this.get('fragmentFile'));
                        this.get('fragmentFile').clear();
                    },
                    formattedTotalTime: function () {
                        var totalTime = this.get('totalTime');
                        var humanized = util.humanizeDuration(totalTime);
                        return {humanized: humanized, detailed: Math.round(totalTime) + 's'};
                    }.property('totalTime'),
                    currentHighLight: function () {
                        return this.get('lineSegmentMap')[this.get('currentRow')];
                    }.property('currentRow', 'lineSegmentMap').readOnly(),
                    code: demoCode,
                    errors: [],
                    bbox: {},
                    totalTime: 0,
                    lineSegmentMap: [],
                    currentRow: null,
                    simulatedPath: [],
                    computing: true,
                    fragmentFile: [],
                    canSelectLanguage: false,
                    usingGcode: true,
                    decorations: []
                });
                console.log(demoCode);
            });
</script>

</body>
</html>
