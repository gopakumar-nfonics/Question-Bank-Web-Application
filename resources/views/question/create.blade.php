<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaTeX with Textarea</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.15.0/katex.min.css">
</head>
<body>

<h1>KaTeX with Textarea</h1>

<!-- Textarea for LaTeX input -->
<textarea id="latexInput" rows="5" cols="40"></textarea>

<!-- Button to render the LaTeX into math -->
<button onclick="renderMath()">Render Math</button>

<!-- Container to render the LaTeX math -->
<div id="mathOutput"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.15.0/katex.min.js"></script>
<script>
function renderMath() {
    var latex = document.getElementById('latexInput').value;
    var output = document.getElementById('mathOutput');
    output.innerHTML = ''; // Clear previous output
    katex.render(latex, output, {
        throwOnError: false
    });
}
</script>

</body>
</html>
