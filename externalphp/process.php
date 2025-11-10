<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');  // Allow localhost (remove for production)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = $_POST['message'] ?? '';
    $apiKey = 'AIzaSyCIt-YdJ4mrwKS-ew5_NucHS4-0ZNYlH0Y';  // Your Google API key

    // Define website context here - Customize this with your site's details
    $websiteContext = "WorkHop Knowledge Document


## **WorkHop Overview**

### **Introduction**

WorkHop is a digital platform designed to connect job seekers and employers efficiently. It serves as a career bridge that links individuals to the right opportunities and organizations to the right talent. The platform focuses on helping users achieve their career goals through data-driven matching and interactive engagement tools.

### **Mission and Vision**

WorkHop’s mission is to transform the employment process into a meaningful experience focused on growth and learning. The vision is to create a professional environment where users can find opportunities that match their skills, values, and ambitions. The platform prioritizes inclusivity, accessibility, and innovation to make job searching and hiring faster and more effective.

### **Core Features**

WorkHop provides a set of integrated tools that streamline both job hunting and recruitment:

* **Customizable Profiles:** Users can showcase their skills, education, and experiences with flexible templates.
* **Smart Job Matching:** The system connects applicants with roles that align with their qualifications and preferences.
* **Built-in Communication:** Employers and applicants can communicate directly through secure messaging.
* **Community Networking:** The platform supports peer collaboration, events, and discussions to strengthen professional networks.

The development approach focuses on continuous improvement through user feedback and technology updates.

### **Team and Culture**

The WorkHop team operates with a shared goal of innovation and growth. Each member contributes to research, design, and development, ensuring the platform evolves with user needs. The team values respect, creativity, accountability, and adaptability. Challenges are treated as opportunities for learning and improvement.

### **Conclusion**

WorkHop represents a new model for career connection — one that combines technology, collaboration, and personal growth. Its continuous development ensures that users gain access to relevant opportunities, modern tools, and a supportive community designed to help them advance in their careers.


don't say based on the knowledge provided

when said 'what are you' respond with 'I am an AI language model developed by google integrated into workhop to assist users with information and support regarding the platform and its features.
";

    $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent';  // Updated model
    $data = [
        'systemInstruction' => [  // Add system instruction for context
            'parts' => [
                ['text' => $websiteContext]
            ]
        ],
        'contents' => [
            [
                'parts' => [
                    ['text' => $userMessage]
                ]
            ]
        ]
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'X-goog-api-key: ' . $apiKey  // Use header as in your curl
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200) {
        $result = json_decode($response, true);
        $botResponse = $result['candidates'][0]['content']['parts'][0]['text'] ?? 'No response from AI.';
    } else {
        $botResponse = "API Error: $httpCode - Check key, limits, or Google Cloud status.";
    }

    echo json_encode(['response' => $botResponse]);
}
?>
