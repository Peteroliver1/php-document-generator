# PhpWord Document Generator Example

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://www.php.net/)
[![Composer](https://img.shields.io/badge/Composer-Required-orange.svg)](https://getcomposer.org/)

Simple PHP project demonstrating how to dynamically generate docs (`.docx`) documents using the powerful `PhpOffice/PhpWord` library. This example focuses on creating a basic "Website Development Project Document" and offering it for immediate download via a web browser.

---

## ✨ Features

* **Effortless DOCX Creation**: Generate professional Word documents (`.docx` format) compatible with Microsoft Word, LibreOffice, Google Docs, and other office suites.
* **Custom Content & Styling**: Easily add text, apply custom font styles (bold, color, size), and control paragraph alignment (e.g., centered titles).
* **Composer-Managed Dependencies**: Leverages Composer for robust and easy management of the PhpWord library and its requirements.
* **Direct Browser Download**: Configured out-of-the-box to initiate a file download when accessed via a web server.
* **Robust Setup**: Includes essential PHP configurations for error handling (`display_errors`, `error_reporting`) and memory management (`memory_limit`), ensuring stability.
* **Clear Project Structure**: A well-organized codebase with explicit file explanations.

---

## 🚀 Getting Started

Follow these steps to get a local copy of the project up and running on your machine.

### Prerequisites

Ensure you have the following software installed:

* **PHP**: Version 7.4 or higher (PHP 8.x is fully supported and recommended).
* **Composer**: The official dependency manager for PHP.

### Installation

1.  **Clone the repository:**
    Open your terminal or command prompt and execute:

    ```bash
    git clone [https://github.com/YOUR_USERNAME/YOUR_REPOSITORY_NAME.git](https://github.com/YOUR_USERNAME/YOUR_REPOSITORY_NAME.git)
    cd YOUR_REPOSITORY_NAME
    ```

    *Remember to replace `YOUR_USERNAME` and `YOUR_REPOSITORY_NAME` with your actual GitHub username and the name of your repository.*

2.  **Install Composer dependencies:**
    Navigate into the cloned project directory (`YOUR_REPOSITORY_NAME`) and run the Composer install command:

    ```bash
    composer install
    ```

    This command will automatically download the `phpoffice/phpword` library and all its required dependencies into the `vendor/` directory.

---

## 🛠️ Usage

### Via Web Server (Recommended for Browser Download)

This is the primary way the script is intended to be used, providing a seamless download experience for end-users.

1.  **Place the project on your web server:**
    Copy the entire `YOUR_REPOSITORY_NAME` folder (including the newly created `vendor/` directory) into your web server's document root (e.g., `htdocs` for Apache, `www` for Nginx, or the public directory specified by your virtual host).

2.  **Access in your web browser:**
    Open your preferred web browser and navigate to the URL of the `index.php` script. For example:

    ```
    http://localhost/YOUR_REPOSITORY_NAME/index.php
    ```

    *(Adjust the URL to match your specific web server configuration and the actual path where you placed the project folder.)*

    Upon accessing this URL, your browser will automatically prompt you to download the generated `.docx` file, typically named something like `Website_Development_Proposal_2025-05-22.docx` (the date will reflect the current system date).

### Via Command Line (for Local File Saving)

If you need to generate the document and save it directly to your server's file system (e.g., for batch processing, API integration, or headless generation) without initiating a browser download, you can modify the `index.php` script and run it via the command line.

1.  **Edit `index.php`:**
    Open the `index.php` file in your favorite text editor.
    * Locate the section commented "Option 2: Force download" and **comment out** all the lines within it (especially the `header()` calls and `ob_end_clean()`).
    * Then, **uncomment** the lines under the comment "Option 1: Save locally first for testing".

    Your modified section in `index.php` should resemble this:

    ```php
    // =============================================
    // 4. SAVE & DOWNLOAD (WITH SAFETY CHECKS)
    // =============================================
    $filename = "Website_Development_Proposal_" . date('Y-m-d') . ".docx";

    // Option 1: Save locally first for testing (comment out headers if using this)
    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save($filename);
    echo "Saved locally: " . realpath($filename);
    exit;

    // Option 2: Force download (COMMENT THESE LINES OUT FOR LOCAL SAVE)
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

2.  **Run from the command line:**
    Navigate to the project's root directory in your terminal and execute:

    ```bash
    php index.php
    ```

    The generated `.docx` file will be saved in the same directory where you ran the command.

---

## 📄 Extending Document Content

The `index.php` script provides a very basic starting point. The `PhpOffice/PhpWord` library is highly versatile and capable of creating complex documents. We encourage you to explore its full potential by modifying `index.php` and consulting the official documentation.

Here are just a few examples of what you can add:

* **Paragraphs, Text Runs, and Line Breaks**: Control text flow and formatting.
* **Images**: Embed images from local paths or URLs.
* **Tables**: Create sophisticated tables with custom cell styling.
* **Lists**: Generate ordered (numbered) and unordered (bulleted) lists.
* **Headers & Footers**: Add consistent content to the top or bottom of pages.
* **Page Numbers**: Automatically insert page numbering.
* **Custom Styles**: Define and apply reusable font, paragraph, and table styles.
* **Sections**: Divide your document into sections with different page orientations, sizes, and headers/footers.

👉 Visit the official [PhpWord documentation](https://phpword.readthedocs.io/en/latest/) for comprehensive guides, examples, and API references.

---

## 🤝 Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have suggestions for improving this example, find a bug, or want to add a new feature:

1.  Fork the Project
2.  Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3.  Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4.  Push to the Branch (`git push origin feature/AmazingFeature`)
5.  Open a Pull Request

---

## 📝 License

This project is open-sourced under the [MIT License](LICENSE).

The `PhpOffice/PhpWord` library itself is distributed under the GNU Lesser General Public License version 3 (LGPLv3). Please refer to the library's official documentation and licensing terms for more details.

---