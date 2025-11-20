<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoundsGood - Sons para Tranquilidade</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="SoundsGood.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background-color: #272053;
            color: #ffffff;
            line-height: 1.6;
            position: relative;
        }


        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(2px 2px at 20px 30px, #A286D7, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 60px 70px, #A286D7, rgba(0,0,0,0)),
                radial-gradient(1.5px 1.5px at 50px 50px, #A286D7, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 130px 80px, #A286D7, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 90px 10px, #A286D7, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 200px 150px, #A286D7, rgba(0,0,0,0)),
                radial-gradient(1.5px 1.5px at 150px 200px, #A286D7, rgba(0,0,0,0));
            background-repeat: repeat;
            background-size: 250px 250px;
            background-position: 0 0, 40px 60px, 130px 270px, 70px 100px, 150px 140px, 200px 50px, 100px 180px;
            pointer-events: none;
            z-index: 0;
            opacity: 0.7;
            animation: twinkle 6s ease-in-out infinite;
        }

        @keyframes twinkle {
            0%, 100% {
                opacity: 0.7;
            }
            50% {
                opacity: 1;
            }
        }

        html {
            scroll-behavior: smooth;
        }



        .navbar {
            background: transparent !important;
            backdrop-filter: none;
            border-bottom: none;
            padding: 1rem 0;
            transition: top 0.3s ease;
            z-index: 1000;
            box-shadow: none;
            position: relative;
        }

        .custom-navbar {
            background: rgba(39, 32, 83, 0.85) !important;
            backdrop-filter: blur(15px);
            box-shadow: 0 4px 30px rgba(162, 134, 215, 0.4);
            border-bottom: 2px solid rgba(162, 134, 215, 0.4);
        }

        .navbar-brand {
            font-size: 1.5rem;
            color: #FAA100 !important;
            font-weight: 700;
            letter-spacing: 1px;
            text-shadow: 0 0 15px rgba(250, 161, 0, 0.7);
        }

        .navbar-brand i {
            color: #FAA100;
            filter: drop-shadow(0 0 8px rgba(250, 161, 0, 0.8));
        }

        .nav-link {
            color: #ffffff !important;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
        }

        .nav-link:hover {
            color: #FAA100 !important;
            text-shadow: 0 0 15px rgba(250, 161, 0, 0.8);
        }

        .custom-nav-links {
            border: 2px solid rgba(162, 134, 215, 0.6);
            border-radius: 50px;
            padding: 0.2rem 1rem;
            background: rgba(162, 134, 215, 0.15);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 25px rgba(162, 134, 215, 0.3);
        }

        .custom-nav-links .nav-item {
            margin: 0 0.5rem;
        }

        .custom-nav-links .nav-link {
            padding: 0.5rem 0.8rem !important;
            color: #ffffff !important;
        }

        .custom-nav-links .nav-link:hover {
            color: #FAA100 !important;
        }

        .nav-link::after {
            content: none;
        }

        .btn-cta {
            position: relative;
            overflow: hidden;
            padding: 0.6rem 1.5rem;
            background: linear-gradient(135deg, #5559A3 0%, #6b6fb5 100%);
            color: #ffffff !important;
            border: 2px solid rgba(162, 134, 215, 0.5);
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(85, 89, 163, 0.6);
        }

        .btn-cta:hover {
            background: linear-gradient(135deg, #6b6fb5 0%, #5559A3 100%);
            box-shadow: 0 0 40px rgba(85, 89, 163, 1), 0 0 60px rgba(250, 161, 0, 0.6);
            border-color: rgba(250, 161, 0, 0.8);
            transform: translateY(-3px);
        }


        .sound-particle {
            position: absolute;
            color: #FAA100;
            filter: drop-shadow(0 0 8px #FAA100);
            z-index: 2;
            opacity: 0;
            pointer-events: none;
            transition: all 0.8s cubic-bezier(0.05, 0.83, 0.43, 0.96);
        }

        .sound-particle.sound-1 {
            font-size: 2rem;
            top: 20%;
            left: 20%;
            transition-delay: 0s;
        }

        .sound-particle.sound-2 {
            font-size: 1.6rem;
            top: 45%;
            left: 45%;
            transition-delay: 0.1s;
        }

        .sound-particle.sound-3 {
            font-size: 1.3rem;
            top: 40%;
            left: 40%;
            transition-delay: 0.2s;
        }

        .sound-particle.sound-4 {
            font-size: 1.8rem;
            top: 25%;
            left: 45%;
            transition-delay: 0.3s;
        }

        .btn-cta:hover .sound-particle,
        .btn-hero:hover .sound-particle {
            opacity: 1;
            filter: drop-shadow(0 0 20px #FAA100);
        }

        .btn-cta:hover .sound-1,
        .btn-hero:hover .sound-1 {
            top: -80%;
            left: -30%;
        }

        .btn-cta:hover .sound-2,
        .btn-hero:hover .sound-2 {
            top: -25%;
            left: 10%;
        }

        .btn-cta:hover .sound-3,
        .btn-hero:hover .sound-3 {
            top: 55%;
            left: 25%;
        }

        .btn-cta:hover .sound-4,
        .btn-hero:hover .sound-4 {
            top: 25%;
            left: 115%;
        }



        .hero-section {
            background: linear-gradient(135deg, #FAA100 0%, #653AB8 50%, #272053 100%);
            position: relative;
            overflow: hidden;
            padding-top: 100px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            z-index: 1;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(162, 134, 215, 0.25) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(250, 161, 0, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 50% 0%, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            pointer-events: none;
            animation: astral-glow 8s ease-in-out infinite;
            z-index: 0;
        }

        @keyframes astral-glow {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.85;
            }
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
            text-shadow: 0 4px 25px rgba(250, 161, 0, 0.5), 0 0 40px rgba(162, 134, 215, 0.3);
            animation: fade-in-down 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
            animation: fade-in-up 1s ease-out 0.2s both;
        }

        .btn-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #5559A3 0%, #6b6fb5 100%);
            color: white !important;
            border: 2px solid rgba(162, 134, 215, 0.5);
            font-weight: 600;
            padding: 1rem 2rem;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
            z-index: 1;
            animation: fade-in-up 1s ease-out 0.4s both;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(85, 89, 163, 0.6);
        }

        .btn-hero:hover {
            background: linear-gradient(135deg, #6b6fb5 0%, #5559A3 100%);
            box-shadow: 0 0 40px rgba(85, 89, 163, 1), 0 0 60px rgba(250, 161, 0, 0.6);
            border-color: rgba(250, 161, 0, 0.8);
            transform: translateY(-3px);
        }

        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-image {
            position: relative;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

        .sound-wave {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            height: 200px;
        }

        .sound-wave span {
            width: 10px;
            background: linear-gradient(180deg, #FAA100 0%, #A286D7 100%);
            border-radius: 10px;
            animation: wave 1.2s ease-in-out infinite;
            box-shadow: 0 0 15px rgba(250, 161, 0, 0.8), 0 0 25px rgba(162, 134, 215, 0.6);
        }

        .sound-wave span:nth-child(1) {
            height: 40px;
            animation-delay: 0s;
        }

        .sound-wave span:nth-child(2) {
            height: 80px;
            animation-delay: 0.1s;
        }

        .sound-wave span:nth-child(3) {
            height: 120px;
            animation-delay: 0.2s;
        }

        .sound-wave span:nth-child(4) {
            height: 80px;
            animation-delay: 0.3s;
        }

        .sound-wave span:nth-child(5) {
            height: 40px;
            animation-delay: 0.4s;
        }

        @keyframes wave {
            0%, 100% {
                height: 40px;
                opacity: 0.7;
            }
            50% {
                height: 120px;
                opacity: 1;
            }
        }



        .section-about {
            background: linear-gradient(180deg, #514A81 0%, #5a5393 50%, #514A81 100%);
            padding: 100px 0;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .section-about::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 5% 15%, rgba(162, 134, 215, 0.4) 0%, transparent 35%),
                radial-gradient(circle at 95% 85%, rgba(250, 161, 0, 0.35) 0%, transparent 35%),
                radial-gradient(circle at 50% 50%, rgba(162, 134, 215, 0.25) 0%, transparent 60%),
                radial-gradient(circle at 20% 70%, rgba(250, 161, 0, 0.2) 0%, transparent 40%),
                radial-gradient(circle at 80% 20%, rgba(162, 134, 215, 0.2) 0%, transparent 40%),
                radial-gradient(circle at 35% 35%, rgba(250, 161, 0, 0.15) 0%, transparent 50%);
            pointer-events: none;
            animation: astral-glow 12s ease-in-out infinite;
            z-index: 0;
        }

        .section-about::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(162, 134, 215, 0.8), transparent);
            box-shadow: 0 0 30px rgba(162, 134, 215, 0.6);
        }

        .section-about::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(250, 161, 0, 0.6), transparent);
            box-shadow: 0 0 30px rgba(250, 161, 0, 0.5);
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            z-index: 2;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 1rem;
            text-shadow: 0 2px 15px rgba(250, 161, 0, 0.3), 0 0 30px rgba(162, 134, 215, 0.3);
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin: 0 auto;
        }

        .feature-item {
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.2) 0%, rgba(250, 161, 0, 0.1) 100%);
            border: 2px solid rgba(162, 134, 215, 0.5);
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 30px rgba(162, 134, 215, 0.2);
        }

        .feature-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 30%, rgba(250, 161, 0, 0.15) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 0;
        }

        .feature-item:hover {
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.35) 0%, rgba(250, 161, 0, 0.2) 100%);
            border-color: rgba(250, 161, 0, 0.8);
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(162, 134, 215, 0.4), 0 0 40px rgba(250, 161, 0, 0.3);
        }

        .feature-item:hover::before {
            opacity: 1;
        }

        .feature-icon {
            font-size: 3rem;
            color: #FAA100;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
            transition: transform 0.3s ease;
            filter: drop-shadow(0 0 15px rgba(250, 161, 0, 0.7));
        }

        .feature-item:hover .feature-icon {
            transform: scale(1.15) rotate(5deg);
            filter: drop-shadow(0 0 25px rgba(250, 161, 0, 1));
        }

        .feature-item h4 {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .feature-item p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
        }



        .section-showcase {
            background: linear-gradient(180deg, #514A81 0%, #5a5393 50%, #514A81 100%);
            padding: 100px 0;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .section-showcase::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 15% 25%, rgba(162, 134, 215, 0.45) 0%, transparent 40%),
                radial-gradient(circle at 85% 75%, rgba(250, 161, 0, 0.4) 0%, transparent 40%),
                radial-gradient(circle at 50% 50%, rgba(162, 134, 215, 0.3) 0%, transparent 65%),
                radial-gradient(circle at 75% 15%, rgba(250, 161, 0, 0.25) 0%, transparent 45%),
                radial-gradient(circle at 25% 75%, rgba(162, 134, 215, 0.25) 0%, transparent 45%),
                radial-gradient(circle at 60% 35%, rgba(250, 161, 0, 0.2) 0%, transparent 50%);
            pointer-events: none;
            animation: astral-glow 14s ease-in-out infinite;
            z-index: 0;
        }

        .section-showcase::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(250, 161, 0, 0.6), transparent);
            box-shadow: 0 0 30px rgba(250, 161, 0, 0.5);
        }

        .section-showcase::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 15% 30%, rgba(162, 134, 215, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 85% 70%, rgba(250, 161, 0, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 50% 50%, rgba(162, 134, 215, 0.08) 0%, transparent 60%);
            pointer-events: none;
            animation: gradient-shift 15s ease-in-out infinite;
            z-index: 0;
        }

        @keyframes gradient-shift {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.85;
            }
        }

        .showcase-container {
            margin-top: 3rem;
            position: relative;
            z-index: 2;
        }

        .showcase-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            justify-content: center !important;
            flex-wrap: wrap;
        }
        .showcase-text h3 {
            font-size: 2rem;
            color: #ffffff;
            margin-bottom: 1.5rem;
            font-weight: 700;
            text-shadow: 0 0 25px rgba(162, 134, 215, 0.3);
        }

        .showcase-text p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1rem;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .showcase-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .feature-list {
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.2) 0%, rgba(250, 161, 0, 0.1) 100%);
            border: 2px solid rgba(162, 134, 215, 0.5);
            padding: 1.5rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 0 25px rgba(162, 134, 215, 0.2);
        }

        .feature-list:hover {
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.35) 0%, rgba(250, 161, 0, 0.2) 100%);
            border-color: rgba(250, 161, 0, 0.8);
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(162, 134, 215, 0.3), 0 0 30px rgba(250, 161, 0, 0.2);
        }

        .feature-list h4 {
            color: #FAA100;
            font-weight: 600;
            margin-bottom: 1rem;
            text-shadow: 0 0 15px rgba(250, 161, 0, 0.5);
        }

        .feature-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .feature-list li {
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 0.5rem;
            position: relative;
            padding-left: 1.5rem;
            transition: color 0.3s ease;
        }

        .feature-list:hover li {
            color: rgba(255, 255, 255, 0.95);
        }

        .feature-list li::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: #A286D7;
            position: absolute;
            left: 0;
            top: 0.1rem;
            filter: drop-shadow(0 0 8px rgba(162, 134, 215, 0.7));
        }

        .showcase-mockup {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            width: 100%;
        }

        .mockup-frame {
            width: 100%;
            max-width: 350px;
            background-color: #ffffff;
            border-radius: 30px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.8), 0 0 50px rgba(162, 134, 215, 0.5);
            overflow: hidden;
            color: #333;
            min-height: 600px;
            border: 8px solid #333;
            position: relative;
            transition: all 0.3s ease;
            margin: 0 auto !important;
        }

        .mockup-frame:hover {
            box-shadow: 0 35px 100px rgba(0, 0, 0, 0.9), 0 0 70px rgba(162, 134, 215, 0.7);
            transform: translateY(-15px);
        }

        .mockup-frame::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40%;
            height: 10px;
            background-color: #333;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            z-index: 10;
        }

        .breathing-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e0e0e0 0%, #f0f0f0 100%);
            border: 5px solid #f0f0f0;
            animation: pulse 4s infinite ease-in-out;
            box-shadow: 0 0 25px rgba(162, 134, 215, 0.3);
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(1); opacity: 0.8; }
        }

        .btn-mockup-primary {
            background: linear-gradient(135deg, #5559A3 0%, #6b6fb5 100%) !important;
            border-color: rgba(162, 134, 215, 0.4) !important;
            color: #fff !important;
            font-weight: 600;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(85, 89, 163, 0.4);
        }

        .btn-mockup-primary:hover {
            box-shadow: 0 0 35px rgba(85, 89, 163, 0.7) !important;
        }

        .btn-mockup-speed {
            border-radius: 20px !important;
            font-weight: 500;
        }

        .btn-mockup-speed.active {
            background: linear-gradient(135deg, #5559A3 0%, #6b6fb5 100%) !important;
            border-color: #5559A3 !important;
            color: #fff !important;
            box-shadow: 0 0 20px rgba(85, 89, 163, 0.5);
        }

        .btn-mockup-sound {
            border-radius: 15px;
            border: 1px solid #ddd;
            background-color: #f8f8f8;
            color: #333;
            transition: all 0.2s ease;
        }

        .btn-mockup-sound:hover {
            background-color: #e0e0e0;
            box-shadow: 0 0 20px rgba(162, 134, 215, 0.3);
        }

        .btn-mockup-sound i {
            color: #5559A3;
        }

        .btn-mockup-add {
            border-radius: 15px;
            border-style: dashed !important;
            color: #5559A3 !important;
            font-weight: 600;
        }

        .btn-mockup-add:hover {
            background-color: #f0f0f0 !important;
        }

        @media (max-width: 576px) {
            .breathing-section {
                flex-direction: column;
                text-align: center;
            }
            .breathing-controls {
                margin-left: 0 !important;
                margin-top: 1rem;
            }
            .showcase-mockup {
                padding: 1rem;
            }

            .mockup-frame {
                max-width: 100% !important;
                width: 90% !important;
            }
        }




        .footer {
            background: linear-gradient(180deg, #774BCC 0%, #8b5fd4 50%, #774BCC 100%);
            color: rgba(255, 255, 255, 0.95);
            padding-top: 0;
            position: relative;
            overflow: hidden;
            z-index: 1;
            border-top: 3px solid rgba(162, 134, 215, 0.8);
            box-shadow: 0 -15px 50px rgba(119, 75, 204, 0.6);
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(162, 134, 215, 0.25) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(250, 161, 0, 0.2) 0%, transparent 40%),
                radial-gradient(circle at 50% 50%, rgba(162, 134, 215, 0.15) 0%, transparent 60%);
            pointer-events: none;
            animation: astral-glow 15s ease-in-out infinite;
            z-index: 0;
        }

        .wave-container {
            position: relative;
            width: 100%;
            height: 180px;
            margin-bottom: -1px;
            overflow: hidden;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: 100%;
            animation: wave-animation 15s linear infinite;
        }

        .wave:nth-child(1) {
            bottom: 15px;
            opacity: 0.8;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        .wave:nth-child(2) {
            bottom: 8px;
            opacity: 0.6;
            animation-delay: -4s;
            animation-duration: 14s;
        }

        .wave:nth-child(3) {
            bottom: 0;
            opacity: 0.4;
            animation-delay: -8s;
            animation-duration: 17s;
        }

        @keyframes wave-animation {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        .footer-content {
            padding: 3rem 0 1.5rem 0;
            position: relative;
            z-index: 2;
            background: rgba(39, 32, 83, 0.2);
            backdrop-filter: blur(10px);
        }

        .footer-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #FAA100;
            margin-bottom: 1rem;
            text-shadow: 0 0 15px rgba(250, 161, 0, 0.7);
        }

        .footer-title a {
            text-decoration: none;
            color: #FAA100 !important;
        }

        .footer-text {
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            color: rgba(255, 255, 255, 0.85);
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(162, 134, 215, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 1.2rem;
            position: relative;
            overflow: hidden;
        }

        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.5), rgba(250, 161, 0, 0.5));
            transition: left 0.3s ease;
            z-index: -1;
        }

        .social-link:hover {
            background: linear-gradient(135deg, #5559A3 0%, #653AB8 100%);
            color: #FAA100;
            transform: translateY(-5px);
            border-color: rgba(250, 161, 0, 0.8);
            box-shadow: 0 0 20px rgba(250, 161, 0, 0.6), 0 0 40px rgba(162, 134, 215, 0.4);
        }

        .social-link:hover::before {
            left: 100%;
        }

        .social-links a {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.3rem;
            margin-right: 1rem;
            transition: all 0.3s ease;
            filter: drop-shadow(0 0 8px rgba(162, 134, 215, 0.5));
        }

        .social-links a:hover {
            color: #FAA100;
            filter: drop-shadow(0 0 15px rgba(250, 161, 0, 0.8));
            transform: scale(1.25) rotate(10deg);
        }

        .footer-subtitle {
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 1rem;
            text-shadow: 0 0 12px rgba(162, 134, 215, 0.4);
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.9rem;
            line-height: 2;
            transition: all 0.3s ease;
        }

        .footer-links li a:hover {
            color: #FAA100;
            text-shadow: 0 0 12px rgba(250, 161, 0, 0.6);
            transform: translateX(8px);
        }

        .footer-contact {
            list-style: none;
            padding: 0;
        }

        .footer-contact li {
            font-size: 0.9rem;
            line-height: 2;
            color: rgba(255, 255, 255, 0.8);
            transition: color 0.3s ease;
        }

        .footer-contact li:hover {
            color: rgba(255, 255, 255, 1);
        }

        .footer-contact li i {
            color: #FAA100;
            filter: drop-shadow(0 0 8px rgba(250, 161, 0, 0.6));
        }

        .footer-divider {
            border-color: rgba(162, 134, 215, 0.5);
            margin-top: 2rem;
            margin-bottom: 1rem;
            box-shadow: 0 0 15px rgba(162, 134, 215, 0.3);
        }

        .footer-copyright {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
        }

        @media (max-width: 992px) {
            .custom-nav-links {
                border: none;
                border-radius: 0;
                padding: 0;
                background: none;
                backdrop-filter: none;
                margin-top: 1rem;
            }
            .custom-nav-links .nav-item {
                margin: 0;
            }
            .custom-nav-links .nav-link {
                padding: 0.5rem 0 !important;
            }
            .btn-entrar {
                display: block !important;
                margin-top: 1rem;
            }
            .showcase-content {
                grid-template-columns: 1fr;
            }

            .showcase-mockup {
                order: -1;
                margin-bottom: 2rem;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding-top: 80px;
            }

            .section-title {
                font-size: 2rem;
            }

            .section-subtitle {
                font-size: 1rem;
            }

            .feature-item {
                padding: 1.5rem;
            }

            .wave-container {
                height: 120px;
            }



            .footer-content .container .row > div {
                text-align: center;
            }


            .footer-links,
            .footer-contact {
                padding-left: 0;
                list-style-type: none;
                display: inline-block;
            }


            .social-links {
                display: flex;
                justify-content: center;
                margin-top: 15px;
                margin-bottom: 15px;
            }


            .social-links .social-link {
                margin: 0 8px;
                font-size: 1.5rem;
            }


            .footer-content .container .row > div {
                margin-bottom: 30px !important;
            }


            .footer-content .container .row > div:last-child {
                margin-bottom: 0 !important;
            }
        }



        .section-divider {
            height: 3px;
            background: linear-gradient(90deg, transparent, rgba(162, 134, 215, 0.8), transparent);
            margin: 50px 0;
            box-shadow: 0 0 30px rgba(162, 134, 215, 0.6), 0 0 50px rgba(250, 161, 0, 0.3);
        }




        .section-testimonials {
            background: linear-gradient(180deg, #514A81 0%, #5a5393 50%, #514A81 100%);
            padding: 100px 0;
            position: relative;
            z-index: 1;
        }

        .section-testimonials::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(162, 134, 215, 0.8), transparent);
            box-shadow: 0 0 30px rgba(162, 134, 215, 0.6);
        }

        .section-testimonials::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(250, 161, 0, 0.6), transparent);
            box-shadow: 0 0 30px rgba(250, 161, 0, 0.5);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
            position: relative;
            z-index: 1;
        }

        .testimonial-card {
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.2) 0%, rgba(250, 161, 0, 0.1) 100%);
            border: 2px solid rgba(162, 134, 215, 0.5);
            padding: 2rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 0 30px rgba(162, 134, 215, 0.2);
            position: relative;
            overflow: hidden;
        }

        .testimonial-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(250, 161, 0, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 0;
        }

        .testimonial-card:hover {
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.35) 0%, rgba(250, 161, 0, 0.2) 100%);
            border-color: rgba(250, 161, 0, 0.8);
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(162, 134, 215, 0.4), 0 0 40px rgba(250, 161, 0, 0.3);
        }

        .testimonial-card:hover::before {
            opacity: 1;
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .testimonial-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.3) 0%, rgba(250, 161, 0, 0.2) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            border: 2px solid rgba(162, 134, 215, 0.5);
            font-size: 2rem;
            color: #FAA100;
            filter: drop-shadow(0 0 10px rgba(250, 161, 0, 0.5));
        }

        .testimonial-info h4 {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 0.3rem;
            position: relative;
            z-index: 1;
        }

        .testimonial-role {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .stars {
            display: flex;
            gap: 0.3rem;
            position: relative;
            z-index: 1;
        }

        .stars i {
            color: #FAA100;
            font-size: 0.9rem;
            filter: drop-shadow(0 0 5px rgba(250, 161, 0, 0.6));
        }

        .testimonial-text {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.95rem;
            line-height: 1.8;
            font-style: italic;
            position: relative;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .testimonial-card {
                padding: 1.5rem;
            }
        }



        .section-showcase .wave-container {
            position: relative;
            width: 100%;
            height: 180px;
            margin: 3rem 0 -1px 0;
            overflow: hidden;
            z-index: 2;
        }

        .section-showcase .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: 100%;
            animation: wave-animation 15s linear infinite;
        }

        .section-showcase .wave:nth-child(1) {
            bottom: 15px;
            opacity: 0.8;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        .section-showcase .wave:nth-child(2) {
            bottom: 8px;
            opacity: 0.6;
            animation-delay: -4s;
            animation-duration: 14s;
        }

        .section-showcase .wave:nth-child(3) {
            bottom: 0;
            opacity: 0.4;
            animation-delay: -8s;
            animation-duration: 17s;
        }




        .section-pricing {
            background: linear-gradient(180deg, #514A81 0%, #5a5393 50%, #514A81 100%);
            padding: 100px 0;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .section-pricing::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(162, 134, 215, 0.8), transparent);
            box-shadow: 0 0 30px rgba(162, 134, 215, 0.6);
        }

        .section-pricing::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 10% 30%, rgba(162, 134, 215, 0.35) 0%, transparent 40%),
                radial-gradient(circle at 90% 70%, rgba(250, 161, 0, 0.3) 0%, transparent 40%),
                radial-gradient(circle at 50% 50%, rgba(162, 134, 215, 0.2) 0%, transparent 65%),
                radial-gradient(circle at 70% 20%, rgba(250, 161, 0, 0.2) 0%, transparent 45%),
                radial-gradient(circle at 30% 80%, rgba(162, 134, 215, 0.15) 0%, transparent 45%);
            pointer-events: none;
            animation: astral-glow 13s ease-in-out infinite;
            z-index: 0;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
            position: relative;
            z-index: 2;
        }

        .pricing-card {
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.2) 0%, rgba(250, 161, 0, 0.1) 100%);
            border: 2px solid rgba(162, 134, 215, 0.5);
            padding: 2.5rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 0 30px rgba(162, 134, 215, 0.2);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .pricing-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(250, 161, 0, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 0;
        }

        .pricing-card:hover {
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.35) 0%, rgba(250, 161, 0, 0.2) 100%);
            border-color: rgba(250, 161, 0, 0.8);
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(162, 134, 215, 0.4), 0 0 40px rgba(250, 161, 0, 0.3);
            cursor: pointer;
        }

        .pricing-card:hover::before {
            opacity: 1;
        }

        .pricing-card.featured {
            border-color: rgba(250, 161, 0, 0.8);
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.3) 0%, rgba(250, 161, 0, 0.15) 100%);
            box-shadow: 0 0 40px rgba(250, 161, 0, 0.4), 0 0 60px rgba(162, 134, 215, 0.3);
            transform: scale(1.05);
        }

        .pricing-card.active {
            border-color: rgba(250, 161, 0, 0.9) !important;
            background: linear-gradient(135deg, rgba(162, 134, 215, 0.4) 0%, rgba(250, 161, 0, 0.2) 100%) !important;
            box-shadow: 0 0 50px rgba(250, 161, 0, 0.6), 0 0 80px rgba(162, 134, 215, 0.5) !important;
            transform: scale(1.02) !important;
        }

        .pricing-badge {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #FAA100 0%, #ff6b9d 100%);
            color: #272053;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            box-shadow: 0 0 20px rgba(250, 161, 0, 0.6);
            z-index: 2;
        }

        .pricing-header {
            position: relative;
            z-index: 1;
            margin-bottom: 1.5rem;
        }

        .pricing-name {
            color: #ffffff;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .pricing-description {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .pricing-price {
            position: relative;
            z-index: 1;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: baseline;
            gap: 0.5rem;
        }

        .currency {
            color: #FAA100;
            font-size: 1.2rem;
            filter: drop-shadow(0 0 5px rgba(250, 161, 0, 0.6));
        }

        .amount {
            color: #ffffff;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .period {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        .pricing-discount {
            position: relative;
            z-index: 1;
            background: rgba(250, 161, 0, 0.2);
            border: 1px solid rgba(250, 161, 0, 0.5);
            color: #FAA100;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin: 0 0 2rem 0;
            position: relative;
            z-index: 1;
            flex-grow: 1;
        }

        .pricing-features li {
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .pricing-features li i {
            color: #FAA100;
            font-size: 0.9rem;
            filter: drop-shadow(0 0 5px rgba(250, 161, 0, 0.6));
        }

        .pricing-features li.disabled {
            color: rgba(255, 255, 255, 0.4);
        }

        .pricing-features li.disabled i {
            color: rgba(255, 255, 255, 0.3);
            filter: none;
        }

        .btn-pricing-primary {
            background: linear-gradient(135deg, #5559A3 0%, #6b6fb5 100%) !important;
            border: 2px solid rgba(162, 134, 215, 0.5) !important;
            color: #fff !important;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            box-shadow: 0 0 20px rgba(85, 89, 163, 0.6);
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .btn-pricing-primary:hover {
            box-shadow: 0 0 40px rgba(85, 89, 163, 1), 0 0 60px rgba(250, 161, 0, 0.6) !important;
            border-color: rgba(250, 161, 0, 0.8) !important;
            transform: translateY(-3px);
        }

        .btn-pricing-secondary {
            background: transparent !important;
            border: 2px solid rgba(162, 134, 215, 0.5) !important;
            color: #ffffff !important;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .btn-pricing-secondary:hover {
            background: rgba(162, 134, 215, 0.2) !important;
            border-color: rgba(250, 161, 0, 0.8) !important;
            box-shadow: 0 0 20px rgba(162, 134, 215, 0.4);
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .pricing-grid {
                grid-template-columns: 1fr;
            }

            .pricing-card.featured {
                transform: scale(1);
            }

            .pricing-card {
                padding: 1.5rem;
            }
        }
        @media (max-width: 576px) {


            .showcase-text {
                text-align: center !important;
            }

            .showcase-text h3 {
                text-align: center !important;
            }

            .showcase-text p {
                margin: 0 auto;
                max-width: 95%;
                text-align: center !important;
            }


            .showcase-features {
                display: flex;
                flex-direction: column !important;
                align-items: center;
                gap: 1.5rem;
                margin-top: 1rem;
            }

            .feature-list {
                width: 100% !important;
                max-width: 300px;
                text-align: center;
            }

            .feature-list ul {
                padding-left: 0 !important;
                list-style: none;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
        <div class="container">

            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-satellite me-2"></i>SoundsGood
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">

                <ul class="navbar-nav custom-nav-links mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#sobre">Quem Somos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contato">Contatos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#beneficios">Serviços</a></li>
                </ul>


                <a class="btn btn-cta btn-entrar d-none d-lg-inline-block" href="#entrar">
                    Entrar
                </a>
            </div>
        </div>
    </nav>


    <section id="inicio" class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <h1 class="hero-title">Encontre Paz e Tranquilidade com Sons Curados</h1>
                    <p class="hero-subtitle">Descubra uma coleção de sons naturais e musicais especialmente selecionados para aliviar a ansiedade e promover bem-estar mental.</p>
                    <a href="#beneficios" class="btn btn-hero btn-lg">
                        Explorar Sons <i class="fas fa-arrow-right ms-2"></i>
                        <i class="sound-particle sound-1 fas fa-music"></i>
                        <i class="sound-particle sound-2 fas fa-volume-up"></i>
                        <i class="sound-particle sound-3 fas fa-headphones"></i>
                        <i class="sound-particle sound-4 fas fa-wave-square"></i>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <div class="sound-wave">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="sobre" class="section-about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-header mb-5">
                        <h2 class="section-title">O que é SoundsGood?</h2>
                        <p class="section-subtitle">SoundsGood é uma plataforma dedicada a oferecer sons terapêuticos e ambientes sonoros que ajudam a reduzir a ansiedade, melhorar o foco e promover um estado de bem-estar profundo. Nossos sons são cuidadosamente selecionados por especialistas em terapia sonora.</p>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-4 mb-4">
                            <div class="feature-item">
                                <div class="feature-icon"><i class="fas fa-heart"></i></div>
                                <h4>Terapêutico</h4>
                                <p>Sons baseados em pesquisa científica para reduzir ansiedade e estresse do dia a dia.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="feature-item">
                                <div class="feature-icon"><i class="fas fa-spa"></i></div>
                                <h4>Natureza Pura</h4>
                                <p>Ambientes sonoros naturais como chuva, floresta e oceano para uma experiência imersiva.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="feature-item">
                                <div class="feature-icon"><i class="fas fa-moon"></i></div>
                                <h4>Sempre Disponível</h4>
                                <p>Acesse nossos sons a qualquer hora, em qualquer lugar, para encontrar paz quando precisar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-divider"></div>


    <section id="beneficios" class="section-showcase">
        <div class="container">
            <div class="section-header mb-5">
                <h2 class="section-title">Explore a Plataforma</h2>
                <p class="section-subtitle">Veja como funciona a interface intuitiva do SoundsGood e descubra uma experiência única de bem-estar.</p>
            </div>
            <div class="showcase-container">
                <div class="showcase-content">
                    <div class="showcase-text">
                        <h3>Sua Jornada para a Tranquilidade</h3>
                        <p>O SoundsGood oferece uma experiência imersiva com categorias curadas, sons premium e um design pensado para sua paz mental. Navegue por diferentes ambientes sonoros e encontre o que funciona melhor para você.</p>
                        <div class="showcase-features">
                            <div class="feature-list">
                                <h4>Categorias Principais</h4>
                                <ul>
                                    <li>Sons da Natureza</li>
                                    <li>Meditação Guiada</li>
                                    <li>Música Relaxante</li>
                                    <li>Ambientes Urbanos</li>
                                </ul>
                            </div>
                            <div class="feature-list">
                                <h4>Recursos</h4>
                                <ul>
                                    <li>Reprodução Contínua</li>
                                    <li>Temporizador Personalizável</li>
                                    <li>Favoritos e Playlists</li>
                                    <li>Modo Offline</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="showcase-mockup">
                        <div class="mockup-frame">
                            <div class="mockup-body p-4">
                                <h2 class="mockup-section-title fs-5 fw-bold mb-3">Respiração Guiada</h2>
                                <div class="breathing-section d-flex align-items-center mb-4">
                                    <div class="breathing-circle flex-shrink-0"></div>
                                    <div class="breathing-controls flex-grow-1 ms-3">
                                        <button class="btn btn-primary w-100 mb-2 btn-mockup-primary">Iniciar Respiração</button>
                                        <div class="btn-group w-100 mb-2" role="group" aria-label="Controles de Velocidade">
                                            <button type="button" class="btn btn-outline-secondary btn-sm btn-mockup-speed">Lento</button>
                                            <button type="button" class="btn btn-secondary btn-sm btn-mockup-speed active">Médio</button>
                                            <button type="button" class="btn btn-outline-secondary btn-sm btn-mockup-speed">Rápido</button>
                                        </div>
                                        <div class="audio-info d-flex justify-content-between align-items-center text-muted small">
                                            <span>Inspire... Expire...</span>
                                            <i class="fas fa-volume-up"></i>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="mockup-section-title fs-5 fw-bold mb-3">Sons Calmantes</h2>
                                <div class="calm-sounds-section">
                                    <div class="volume-control d-flex align-items-center mb-3 text-primary">
                                        <i class="fas fa-volume-up me-2"></i>
                                        <span class="mockup-label fw-normal text-dark">Volume</span>
                                    </div>
                                    <div class="row g-2 sound-items">
                                        <div class="col-4">
                                            <button class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3 btn-mockup-sound">
                                                <i class="fas fa-cloud-showers-heavy mb-1 fs-5"></i>
                                                <span class="small">Chuva suave</span>
                                            </button>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3 btn-mockup-sound">
                                                <i class="fas fa-water mb-1 fs-5"></i>
                                                <span class="small">Mar</span>
                                            </button>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3 btn-mockup-sound">
                                                <i class="fas fa-fire mb-1 fs-5"></i>
                                                <span class="small">Fogueira</span>
                                            </button>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3 btn-mockup-sound">
                                                <i class="fas fa-tree mb-1 fs-5"></i>
                                                <span class="small">Floresta</span>
                                            </button>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-light w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3 btn-mockup-sound">
                                                <i class="fas fa-leaf mb-1 fs-5"></i>
                                                <span class="small">Ambiente tranquilo</span>
                                            </button>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-outline-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center py-3 btn-mockup-add">
                                                <span class="small">Adicionar meu som</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-divider"></div>


    <section id="planos" class="section-pricing">
        <div class="container">
            <div class="section-header mb-5">
                <h2 class="section-title">Planos e Preços</h2>
                <p class="section-subtitle">Escolha o plano perfeito para sua jornada de bem-estar e tranquilidade.</p>
            </div>
            <div class="pricing-grid">

                <div class="pricing-card" data-plan="gratuito">
                    <div class="pricing-header">
                        <h3 class="pricing-name">Gratuito</h3>
                        <p class="pricing-description">Comece sua jornada</p>
                    </div>
                    <div class="pricing-price">
                        <span class="currency">R$</span>
                        <span class="amount">0</span>
                        <span class="period">/mês</span>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> Acesso a 50+ sons</li>
                        <li><i class="fas fa-check"></i> Reprodução básica</li>
                        <li><i class="fas fa-check"></i> Anúncios inclusos</li>
                        <li class="disabled"><i class="fas fa-times"></i> Modo offline</li>
                        <li class="disabled"><i class="fas fa-times"></i> Sem anúncios</li>
                    </ul>
                    <button class="btn btn-pricing-secondary">Começar Agora</button>
                </div>

                <div class="pricing-card" data-plan="premium">
                    <div class="pricing-badge">Popular</div>
                    <div class="pricing-header">
                        <h3 class="pricing-name">Premium</h3>
                        <p class="pricing-description">Experiência completa</p>
                    </div>
                    <div class="pricing-price">
                        <span class="currency">R$</span>
                        <span class="amount">19,90</span>
                        <span class="period">/mês</span>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> Acesso a 500+ sons</li>
                        <li><i class="fas fa-check"></i> Reprodução ilimitada</li>
                        <li><i class="fas fa-check"></i> Sem anúncios</li>
                        <li><i class="fas fa-check"></i> Modo offline</li>
                        <li><i class="fas fa-check"></i> Playlists personalizadas</li>
                    </ul>
                    <button class="btn btn-pricing-primary">Assinar Agora</button>
                </div>


                <div class="pricing-card" data-plan="anual">
                    <div class="pricing-header">
                        <h3 class="pricing-name">Anual</h3>
                        <p class="pricing-description">Melhor valor</p>
                    </div>
                    <div class="pricing-price">
                        <span class="currency">R$</span>
                        <span class="amount">199</span>
                        <span class="period">/ano</span>
                    </div>
                    <div class="pricing-discount">Economize 17%</div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> Acesso a 500+ sons</li>
                        <li><i class="fas fa-check"></i> Reprodução ilimitada</li>
                        <li><i class="fas fa-check"></i> Sem anúncios</li>
                        <li><i class="fas fa-check"></i> Modo offline</li>
                        <li><i class="fas fa-check"></i> Suporte prioritário</li>
                    </ul>
                    <button class="btn btn-pricing-secondary">Assinar Agora</button>
                </div>
            </div>
        </div>
    </section>
    <div class="section-divider"></div>
    <footer class="footer">

        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <h5 class="footer-title">
                            <a class="navbar-brand fw-bold" href="#">
                                <i class="fas fa-satellite me-2"></i>SoundsGood
                            </a>
                        </h5>
                        <p class="footer-text">Transformando vidas através do poder terapêutico dos sons naturais.</p>
                        <div class="social-links">
                            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-4">
                        <h6 class="footer-subtitle">Links</h6>
                        <ul class="footer-links">
                            <li><a href="#inicio">Início</a></li>
                            <li><a href="#sobre">Sobre</a></li>
                            <li><a href="#beneficios">Benefícios</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-4">
                        <h6 class="footer-subtitle">Recursos</h6>
                        <ul class="footer-links">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Suporte</a></li>
                            <li><a href="#">Política de Privacidade</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <h6 class="footer-subtitle">Contato</h6>
                        <ul class="footer-contact">
                            <li><i class="fas fa-envelope me-2"></i>Gabrieloliveira.prado@hotmail.com</li>
                            <li><i class="fas fa-phone me-2"></i>+55 81 8510-2009</li>
                            <li><i class="fas fa-map-marker-alt me-2"></i>Recife, Brasil</li>
                        </ul>
                    </div>
                </div>
                <hr class="footer-divider">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="footer-copyright">&copy; 2025 SoundsGood. Todos os direitos reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                navbar.style.top = '-65px';
            } else {
                navbar.style.top = '0';
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }, false);
    </script>


    <script>
        document.querySelectorAll('.pricing-card').forEach(card => {
            card.addEventListener('click', function() {
                // Remove active class from all cards
                document.querySelectorAll('.pricing-card').forEach(c => {
                    c.classList.remove('active');
                });
                // Add active class to clicked card
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
