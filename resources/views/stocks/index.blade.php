@extends("layouts.template")

@section("value")
   @livewire("stock")
@endsection
@section("script")
<script>
    function printDivs(el) {
        var divContents = document.getElementById(el).innerHTML;
        var a = window.open('', '', 'height=auto, width=30vw');
        a.document.write('<html>');
        a.document.write('<head>');
        a.document.write('<link rel="stylesheet" href="css/apps.css"/>');
        a.document.write('<link rel="stylesheet" href="css/bootstrap.min.css"/>');
        a.document.write('</head>');
        a.document.write('<body>');
        a.document.write('<table class="table table-stripped text-center">');
        a.document.write('<table>');
        a.document.write(divContents);
        a.document.write('</table>');
        a.document.write('</body>');
        a.document.close();
        a.print();
    }
    console.log("recu")
</script>
@endsection
