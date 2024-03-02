<!DOCTYPE html>
<html>
<head>
    <title>Word Frequency Counter</title>
</head>
<body>
    <h1>Word Frequency Counter</h1>
    <form method="post">
        <textarea name="text" rows="10" cols="50"></textarea><br>
        <label for="sorting-order">Sorting Order:</label>
        <select name="sorting-order" id="sorting-order">
            <option value="ascending">Ascending</option>
            <option value="descending">Descending</option>
        </select><br>
        <label for="display-limit">Display Limit:</label>
        <input type="number" name="display-limit" id="display-limit" min="1"><br>
        <input type="submit" name="submit" value="Count Words">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        // Get the input text from the textarea
        $text = $_POST['text'];

        // Tokenize the text into words
        $words = preg_split('/\s+|[^\w\s]/', $text, -1, PREG_SPLIT_NO_EMPTY);

        // Convert words to lowercase
        $words = array_map('strtolower', $words);

        // Define common stop words to ignore
        $stopWords = array('the', 'and', 'in','for','then', 'their','them','on', 'this','is','are');

        // Calculate the frequency of each word
        $wordCount = array_count_values($words);

        // Remove stop words from the word count
        foreach ($stopWords as $stopWord) {
            unset($wordCount[$stopWord]);
        }

        // Sort the word count based on user's choice of sorting order
        $sortingOrder = $_POST['sorting-order'];
        if ($sortingOrder == 'ascending') {
            asort($wordCount);
        } else {
            arsort($wordCount);
        }

        // Get the display limit specified by the user
        $displayLimit = $_POST['display-limit'];

        // Display the word count
        echo "<h2>Word Frequency:</h2>";
        $counter = 0;
        foreach ($wordCount as $word => $count) {
            echo "$word: $count<br>";
            $counter++;
            if ($displayLimit && $counter >= $displayLimit) {
                break;
            }
        }
    }
    ?>
</body>
</html>