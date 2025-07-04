<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Finance Dashboard</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                padding: 20px;
            }

            .hero-container {
                max-width: 1200px;
                width: 100%;
                text-align: center;
            }

            .hero-header {
                margin-bottom: 50px;
                animation: fadeInUp 0.8s ease-out;
            }

            .hero-title {
                font-size: 3.5rem;
                font-weight: 300;
                margin-bottom: 15px;
                letter-spacing: -0.02em;
            }

            .hero-subtitle {
                font-size: 1.2rem;
                opacity: 0.9;
                font-weight: 300;
            }

            .metrics-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 30px;
                margin-bottom: 50px;
            }

            .metric-card {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 20px;
                padding: 35px 25px;
                transition: all 0.3s ease;
                animation: fadeInUp 0.8s ease-out;
            }

            .metric-card:nth-child(1) {
                animation-delay: 0.1s;
            }

            .metric-card:nth-child(2) {
                animation-delay: 0.2s;
            }

            .metric-card:nth-child(3) {
                animation-delay: 0.3s;
            }

            .metric-card:nth-child(4) {
                animation-delay: 0.4s;
            }

            .metric-card:hover {
                transform: translateY(-5px);
                background: rgba(255, 255, 255, 0.15);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            }

            .metric-value {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 10px;
                color: #ffffff;
            }

            .metric-label {
                font-size: 0.9rem;
                opacity: 0.8;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: 5px;
            }

            .metric-change {
                font-size: 0.85rem;
                font-weight: 500;
            }

            .positive {
                color: #4ade80;
            }

            .negative {
                color: #f87171;
            }

            .cta-section {
                animation: fadeInUp 0.8s ease-out 0.5s both;
            }

            .cta-button {
                display: inline-block;
                background: rgba(255, 255, 255, 0.2);
                color: white;
                padding: 15px 40px;
                border: 2px solid rgba(255, 255, 255, 0.3);
                border-radius: 50px;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
            }

            .cta-button:hover {
                background: rgba(255, 255, 255, 0.3);
                transform: translateY(-2px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @media (max-width: 768px) {
                .hero-title {
                    font-size: 2.5rem;
                }

                .metrics-grid {
                    grid-template-columns: 1fr;
                    gap: 20px;
                }

                .metric-card {
                    padding: 25px 20px;
                }
            }
        </style>
    </head>

    <body>
        <div class="hero-container">
            <div class="hero-header">
                <h1 class="hero-title">Product Finance Hub</h1>
                <p class="hero-subtitle">Strategic insights for data-driven product decisions</p>
            </div>

            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-label">Monthly Revenue</div>
                    <div class="metric-value">$847K</div>
                    <div class="metric-change positive">↗ +12.3%</div>
                </div>

                <div class="metric-card">
                    <div class="metric-label">Customer LTV</div>
                    <div class="metric-value">$2,340</div>
                    <div class="metric-change positive">↗ +8.1%</div>
                </div>

                <div class="metric-card">
                    <div class="metric-label">CAC Payback</div>
                    <div class="metric-value">8.2 mo</div>
                    <div class="metric-change negative">↘ -2.1%</div>
                </div>

                <div class="metric-card">
                    <div class="metric-label">Gross Margin</div>
                    <div class="metric-value">72%</div>
                    <div class="metric-change positive">↗ +1.5%</div>
                </div>
            </div>

            <div class="cta-section">
                <a href="#" class="cta-button">View Full Dashboard</a>
            </div>
        </div>
    </body>

</html>
