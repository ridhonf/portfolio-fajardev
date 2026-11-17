<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $name }}</title>
    <style>
        @page {
            margin: 2cm;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 11pt;
            line-height: 1.6;
            color: #1f2937;
            background: white;
        }
        .container {
            max-width: 100%;
        }
        /* Header */
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 3px solid #1f2937;
            margin-bottom: 24px;
        }
        .name {
            font-size: 28pt;
            font-weight: 700;
            color: #1f2937;
            letter-spacing: -0.5px;
        }
        .title {
            font-size: 14pt;
            color: #4b5563;
            margin-top: 6px;
            font-weight: 400;
        }
        .contact-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 16px;
            margin-top: 16px;
            font-size: 10pt;
            color: #6b7280;
        }
        .contact-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .contact-item a {
            color: #2563eb;
            text-decoration: none;
        }
        .contact-item a:hover {
            text-decoration: underline;
        }
        /* Section */
        .section {
            margin-bottom: 24px;
        }
        .section-title {
            font-size: 13pt;
            font-weight: 700;
            color: #1f2937;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 6px;
            margin-bottom: 16px;
        }
        /* Summary */
        .summary-text {
            text-align: justify;
            color: #374151;
            line-height: 1.7;
        }
        /* Education & Experience */
        .entry {
            margin-bottom: 16px;
        }
        .entry:last-child {
            margin-bottom: 0;
        }
        .entry-header {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 4px;
        }
        .entry-role {
            font-size: 12pt;
            font-weight: 600;
            color: #1f2937;
        }
        .entry-company {
            font-size: 11pt;
            color: #2563eb;
            font-weight: 500;
        }
        .entry-period {
            font-size: 10pt;
            color: #6b7280;
            white-space: nowrap;
        }
        .entry-description {
            font-size: 10.5pt;
            color: #4b5563;
            line-height: 1.6;
            margin-top: 4px;
            text-align: justify;
        }
        /* Skills */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }
        .skill-category {
            margin-bottom: 8px;
        }
        .skill-category-title {
            font-size: 11pt;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 6px;
        }
        .skill-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }
        .skill-tag {
            font-size: 9.5pt;
            background: #f3f4f6;
            color: #374151;
            padding: 4px 10px;
            border-radius: 4px;
            border: 1px solid #e5e7eb;
        }
        /* Projects */
        .project {
            margin-bottom: 16px;
            padding: 14px;
            background: #fafafa;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
        }
        .project:last-child {
            margin-bottom: 0;
        }
        .project-header {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 6px;
        }
        .project-title {
            font-size: 12pt;
            font-weight: 600;
            color: #1f2937;
        }
        .project-links {
            display: flex;
            gap: 10px;
        }
        .project-link {
            font-size: 9pt;
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }
        .project-link:hover {
            text-decoration: underline;
        }
        .project-description {
            font-size: 10pt;
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 8px;
            text-align: justify;
        }
        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-bottom: 8px;
        }
        .tech-tag {
            font-size: 8.5pt;
            background: #dbeafe;
            color: #1e40af;
            padding: 2px 8px;
            border-radius: 3px;
        }
        .project-features {
            font-size: 9.5pt;
            color: #4b5563;
        }
        .feature-list {
            margin-left: 16px;
            margin-top: 4px;
        }
        .feature-item {
            margin-bottom: 3px;
        }
        /* Footer */
        .footer {
            margin-top: 32px;
            padding-top: 16px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 9pt;
            color: #9ca3af;
        }
        /* Print adjustments */
        @media print {
            .project-link {
                color: #1f2937;
            }
            .tech-tag {
                background: #e5e7eb;
                color: #1f2937;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1 class="name">{{ $name }}</h1>
            <p class="title">{{ $title }}</p>
            <div class="contact-info">
                <span class="contact-item">📍 {{ $location }}</span>
                <span class="contact-item">✉️ <a href="mailto:{{ $email }}">{{ $email }}</a></span>
                <span class="contact-item">📱 {{ $phone }}</span>
                <span class="contact-item">💻 <a href="https://{{ $github }}" target="_blank">{{ $github }}</a></span>
                <span class="contact-item">🔗 <a href="https://{{ $linkedin }}" target="_blank">{{ $linkedin }}</a></span>
                <span class="contact-item">📸 <a href="https://{{ $instagram }}" target="_blank">{{ $instagram }}</a></span>
            </div>
        </header>

        <!-- Summary -->
        <section class="section">
            <h2 class="section-title">Ringkasan Profesional</h2>
            <p class="summary-text">{{ $summary }}</p>
        </section>

        <!-- Education -->
        <section class="section">
            <h2 class="section-title">Pendidikan</h2>
            @foreach($education as $edu)
            <div class="entry">
                <div class="entry-header">
                    <div>
                        <div class="entry-role">{{ $edu['degree'] }}</div>
                        <div class="entry-company">{{ $edu['major'] }}</div>
                    </div>
                    <span class="entry-period">{{ $edu['year'] }}</span>
                </div>
                <p class="entry-description">{{ $edu['description'] }}</p>
            </div>
            @endforeach
        </section>

        <!-- Experience -->
        <section class="section">
            <h2 class="section-title">Pengalaman Kerja</h2>
            @foreach($experience as $exp)
            <div class="entry">
                <div class="entry-header">
                    <div>
                        <div class="entry-role">{{ $exp['role'] }}</div>
                        <div class="entry-company">{{ $exp['company'] }}</div>
                    </div>
                    <span class="entry-period">{{ $exp['period'] }}</span>
                </div>
                <p class="entry-description">{{ $exp['description'] }}</p>
            </div>
            @endforeach
        </section>

        <!-- Skills -->
        <section class="section">
            <h2 class="section-title">Keahlian Teknis</h2>
            <div class="skills-grid">
                @foreach($skills as $category => $items)
                <div class="skill-category">
                    <div class="skill-category-title">{{ $category }}</div>
                    <div class="skill-tags">
                        @foreach($items as $skill)
                        <span class="skill-tag">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Projects -->
        @if(count($projects) > 0)
        <section class="section">
            <h2 class="section-title">Proyek Terpilih</h2>
            @foreach($projects as $project)
            <div class="project">
                <div class="project-header">
                    <h3 class="project-title">{{ $project['title'] }}</h3>
                    <div class="project-links">
                        @if($project['demo_link'])
                        <a href="{{ $project['demo_link'] }}" target="_blank" class="project-link">Live Demo</a>
                        @endif
                        @if($project['github_link'])
                        <a href="{{ $project['github_link'] }}" target="_blank" class="project-link">GitHub</a>
                        @endif
                    </div>
                </div>
                <p class="project-description">{{ $project['description'] }}</p>

                @if(!empty($project['technologies']))
                <div class="project-tech">
                    @foreach($project['technologies'] as $tech)
                    <span class="tech-tag">{{ $tech }}</span>
                    @endforeach
                </div>
                @endif

                @if(!empty($project['features']))
                <div class="project-features">
                    <strong>Fitur Utama:</strong>
                    <ul class="feature-list">
                        @foreach($project['features'] as $feature)
                        <li class="feature-item">{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @endforeach
        </section>
        @endif

        <!-- Footer -->
        <footer class="footer">
            CV ini dibuat otomatis pada {{ $generated_at }} | {{ $name }} - Junior Web Developer
        </footer>
    </div>
</body>
</html>