# Web Dev Document Generator/php Generator

A simple PHP script demonstrating the generation of a Word document (DOCX) using the PhpOffice/PhpWord library. This particular example creates a basic "Website Development Project Document".

## Features

* Generates a `.docx` file.
* Uses `PhpOffice/PhpWord` for document creation.
* Sets default font and size.
* Includes a centered, styled title.
* Configured for direct browser download.

## Prerequisites

Before running this script, ensure you have the following installed:

* **PHP** (version 7.4 or higher recommended, although the autoloader checks for 5.6+)
* **Composer** (for dependency management)

## Installation

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/YOUR_USERNAME/YOUR_REPOSITORY_NAME.git](https://github.com/YOUR_USERNAME/YOUR_REPOSITORY_NAME.git)
    cd YOUR_REPOSITORY_NAME
    ```
    (Replace `YOUR_USERNAME` and `YOUR_REPOSITORY_NAME` with your actual GitHub details)

2.  **Install Composer dependencies:**
    Navigate to the project root directory in your terminal and run:
    ```bash
    composer install
    ```
    This will download and install the `phpword` library and its dependencies into the `vendor/` directory.

## Usage

### Via Web Server

1.  Place the entire project folder (including `vendor/`) in your web server's document root (e.g., `htdocs` for Apache, `www` for Nginx).
2.  Navigate to the script in your web browser:
    ```
    http://localhost/YOUR_PROJECT_FOLDER_NAME/index.php
    ```
    (Replace `YOUR_PROJECT_FOLDER_NAME` and `index.php` if your main script has a different name).

    The browser should automatically prompt you to download the generated `.docx` file.

### Via Command Line (for testing/saving locally)

The current script is set up for browser download. To run it via the command line and save the file locally for testing, you'll need to modify the `index.php` script slightly:

1.  **Comment out the download headers:**
    In your `index.php` file, find the "Option 2: Force download" section and comment out all the `header()` and `ob_end_clean()` lines.

    ```php
    // Option 2: Force download
    // header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    // header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    // header('Cache-Control: max-age=0');
    // header('Expires: 0');
    // header('Pragma: public');
    // ob_end_clean(); // Critical: Remove any accidental output
    // $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    // $objWriter->save('php://output');
    // exit;
    ```

2.  **Uncomment and use the local save option:**
    Uncomment the "Option 1: Save locally first for testing" section:

    ```php
    // Option 1: Save locally first for testing (comment out headers if using this)
    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save($filename);
    echo "Saved locally: " . realpath($filename);
    exit;
    ```

3.  **Run from the command line:**
    ```bash
    php index.php
    ```
    The document will be saved in the same directory where you run the command.

## Project Structure
.
├── index.php                 # The main script that generates the document
├── composer.json             # Composer configuration file
├── composer.lock             # Composer's locked dependencies
├── vendor/                   # Directory for Composer-installed dependencies (e.g., PhpWord)
└── README.md                 # This file

## Contributing

Feel free to fork this repository, make improvements, and submit pull requests.

## License

This project is open-sourced under the MIT License.
