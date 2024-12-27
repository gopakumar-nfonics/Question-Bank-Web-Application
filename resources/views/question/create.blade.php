<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live LaTeX Rendering</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.15.0/katex.min.css">
</head>
<body>

<h1>Live LaTeX Rendering</h1>

<!-- Textarea for LaTeX input -->
<textarea id="latexInput" rows="5" cols="40" placeholder="Type LaTeX here..."></textarea>

<!-- Container to render the LaTeX math -->
<div id="mathOutput"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.15.0/katex.min.js"></script>
<script>
document.getElementById('latexInput').addEventListener('input', function() {
    var latex = this.value;
    var output = document.getElementById('mathOutput');
    output.innerHTML = ''; // Clear previous output
    if (latex.trim() !== '') {
        katex.render(latex, output, {
            throwOnError: false
        });
    }
});
</script>

</body>
</html>
