<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download PDF</title>
</head>
<body>
<script>
    function downloadAndClose() {
        const downloadUrl = "{{ route('meeting.download', ['meeting' => $meeting->id]) }}";
        const link = document.createElement('a');
        link.href = downloadUrl;
        link.download = 'meeting.pdf';
        link.click();
        window.close();
    }

    window.onload = function () {
        setTimeout(downloadAndClose, 1000);
    };
</script>
<p>Ваш файл скачивается. Пожалуйста, подождите...</p>
</body>
</html>
