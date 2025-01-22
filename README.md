# Certificate Generator

A simple PHP-based Certificate Generator that allows you to create personalized certificates for users, students, or participants. This project generates certificates in PDF format, which can be customized with details like names, dates, and event titles.

## Features

- Create certificates dynamically using PHP
- Customize certificate templates with participant details
- Generate downloadable PDF certificates
- Easy to integrate with other PHP projects

## Requirements

- PHP >= 7.4
- Composer (for managing dependencies)
- FPDF library (for generating PDFs)
- A web server (Apache, Nginx, etc.)

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/your-username/certificate-generator.git
cd certificate-generator
```

### 2. Install dependencies

```bash
composer install
```

### 3. Setup the web server

- Ensure your web server is configured to serve the project directory.
- Point the document root to the `public` folder, or configure according to your preferred setup.

### 4. Customize the Certificate Template

- Open the `templates/certificate-template.php` file.
- Modify the template with placeholders for names, dates, and any other data you wish to include.

### 5. Generate Certificates

To generate a certificate, you can pass the participant's details via a web form, or you can create a script to automatically generate certificates based on stored data.

Example URL for generating a certificate:

```
http://your-server/certificate-generator/generate.php?name=John+Doe&event=PHP+Workshop&date=2025-01-22
```

This will generate and download a PDF certificate for "John Doe" for the "PHP Workshop" held on "2025-01-22".

## Example Code

You can find an example script for generating certificates in `generate.php`.

```php
require_once 'vendor/autoload.php';

use FPDF;

class CertificateGenerator {
    public function generate($name, $event, $date) {
        $pdf = new FPDF();
        $pdf->AddPage();
        
        // Set fonts and content
        $pdf->SetFont('Arial', 'B', 24);
        $pdf->Cell(200, 10, 'Certificate of Participation', 0, 1, 'C');
        $pdf->Ln(20);
        $pdf->SetFont('Arial', '', 16);
        $pdf->Cell(200, 10, 'This certifies that', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(200, 10, $name, 0, 1, 'C');
        $pdf->SetFont('Arial', '', 16);
        $pdf->Cell(200, 10, 'has participated in the', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(200, 10, $event, 0, 1, 'C');
        $pdf->SetFont('Arial', '', 16);
        $pdf->Cell(200, 10, 'on ' . $date, 0, 1, 'C');
        
        // Output PDF
        $pdf->Output('D', 'certificate.pdf');
    }
}

$generator = new CertificateGenerator();
$generator->generate($_GET['name'], $_GET['event'], $_GET['date']);
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

Feel free to modify and expand upon this project to suit your needs!
