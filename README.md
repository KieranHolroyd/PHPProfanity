# PHPProfanity

### Install
Download This Repository,
```php
include "filter.php";
```
In your file.
Enter some banned words into words.txt
save the file.
move on to usage

### Usage
```php
$filter = new PHPProfanity();
// Detect Profanity In String
$filter->detect("This is my wonderful string");
// Returns: false
$filter->detect("This is my shit string");
// Returns: true

// Censor Strings (Experimental)
$filter->detect("This is my wonderful string");
// Returns: "This is my wonderful string"
$filter->detect("This is my shit string");
// Returns: "This is my **** string"
```