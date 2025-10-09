@extends('client.layouts.app')

@section('title', 'Về chúng tôi')

@section('body-class', 'about-page')

@push('styles')
<style>
    .about-page {
        overflow-x: hidden;
    }
    .banner-section {
        padding: 120px 0 100px;
        background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
        position: relative;
        overflow: hidden;
    }
    
    .banner-section::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 50%, rgba(16, 185, 129, 0.2) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(5, 150, 105, 0.2) 0%, transparent 50%);
        animation: pulse 8s ease-in-out infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.6; }
    }
    
    .banner-section::after {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        background: 
            repeating-linear-gradient(45deg, 
                transparent, 
                transparent 60px, 
                rgba(255,255,255,0.03) 60px, 
                rgba(255,255,255,0.03) 120px);
        animation: movePattern 30s linear infinite;
    }
    
    @keyframes movePattern {
        0% { transform: translate(0, 0); }
        100% { transform: translate(120px, 120px); }
    }
    
    .banner-wrapper {
        position: relative;
        z-index: 2;
        max-width: 1000px;
        margin: 0 auto;
        transform: translateY(0);
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    
    .banner-wrapper:hover {
        transform: translateY(-20px) scale(1.03);
    }
    
    .banner-wrapper img {
        box-shadow: 
            0 30px 80px rgba(16, 185, 129, 0.4),
            0 0 0 10px rgba(255, 255, 255, 0.1),
            0 0 0 20px rgba(255, 255, 255, 0.05);
        border-radius: 25px;
        animation: floatBanner 6s ease-in-out infinite;
    }
    
    @keyframes floatBanner {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(1deg); }
    }
    
    /* Intro Section */
    .intro-section {
        padding: 100px 0;
        background: linear-gradient(to bottom, #f0fdf4 0%, #ffffff 100%);
        position: relative;
    }
    
    .intro-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 200px;
        background: radial-gradient(ellipse at center top, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
    }
    
    .intro-content {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 1;
    }
    
    .intro-icon {
        font-size: 70px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 25px;
        display: inline-block;
        animation: float 4s ease-in-out infinite, rotate360 20s linear infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0) scale(1); }
        50% { transform: translateY(-20px) scale(1.1); }
    }
    
    @keyframes rotate360 {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .intro-title {
        font-size: 48px;
        font-weight: 800;
        color: #065f46;
        margin-bottom: 25px;
        background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.3;
        text-shadow: 0 0 30px rgba(16, 185, 129, 0.3);
    }
    
    .intro-text {
        font-size: 19px;
        color: #6b7280;
        line-height: 1.9;
        margin-bottom: 20px;
    }
    
    /* Solutions Grid */
    .solutions-section {
        padding: 120px 0;
        background: #ffffff;
        position: relative;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 80px;
    }
    
    .section-subtitle {
        color: #10b981;
        font-weight: 700;
        font-size: 15px;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    
    .section-subtitle::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #10b981, transparent);
        animation: expandLine 2s ease-in-out infinite;
    }
    
    @keyframes expandLine {
        0%, 100% { width: 60px; }
        50% { width: 100px; }
    }
    
    .section-title {
        font-size: 46px;
        font-weight: 800;
        color: #065f46;
        margin-bottom: 25px;
    }
    
    .section-description {
        font-size: 19px;
        color: #6b7280;
        max-width: 750px;
        margin: 0 auto;
        line-height: 1.9;
    }
    
    .solution-card {
        background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
        border-radius: 25px;
        padding: 45px;
        height: 100%;
        box-shadow: 0 8px 30px rgba(16, 185, 129, 0.12);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
        border: 2px solid rgba(16, 185, 129, 0.1);
    }
    
    .solution-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.5s ease;
    }
    
    .solution-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #10b981, #059669, #047857);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.5s ease;
    }
    
    .solution-card:hover {
        transform: translateY(-20px) scale(1.02);
        box-shadow: 0 25px 60px rgba(16, 185, 129, 0.25);
        border-color: #10b981;
    }
    
    .solution-card:hover::before {
        opacity: 1;
        animation: ripple 1.5s ease-out;
    }
    
    .solution-card:hover::after {
        transform: scaleX(1);
    }
    
    @keyframes ripple {
        0% { transform: translate(-50%, -50%) scale(0); opacity: 1; }
        100% { transform: translate(-50%, -50%) scale(1); opacity: 0; }
    }
    
    .solution-card > * {
        position: relative;
        z-index: 1;
    }
    
    .solution-number {
        font-size: 56px;
        font-weight: 800;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        opacity: 0.2;
        margin-bottom: 20px;
        line-height: 1;
    }
    
    .solution-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        position: relative;
    }
    
    .solution-icon::before {
        content: '';
        position: absolute;
        inset: -3px;
        background: linear-gradient(135deg, #10b981, #059669);
        border-radius: 20px;
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: -1;
        filter: blur(10px);
    }
    
    .solution-card:hover .solution-icon {
        transform: rotateY(360deg) scale(1.15);
        box-shadow: 0 15px 40px rgba(16, 185, 129, 0.5);
    }
    
    .solution-card:hover .solution-icon::before {
        opacity: 1;
    }
    
    .solution-icon i {
        font-size: 36px;
        color: #ffffff;
    }
    
    .solution-title {
        font-size: 26px;
        font-weight: 700;
        color: #065f46;
        margin-bottom: 18px;
    }
    
    .solution-description {
        font-size: 16px;
        color: #6b7280;
        line-height: 1.8;
        margin-bottom: 25px;
    }
    
    .solution-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .solution-features li {
        padding: 10px 0;
        color: #4b5563;
        font-size: 15px;
        display: flex;
        align-items: start;
        transition: all 0.3s ease;
    }
    
    .solution-features li:hover {
        color: #065f46;
        transform: translateX(5px);
    }
    
    .solution-features li::before {
        content: '✓';
        color: #10b981;
        font-weight: bold;
        font-size: 18px;
        margin-right: 12px;
        flex-shrink: 0;
        animation: checkmark 0.5s ease;
    }
    
    @keyframes checkmark {
        0% { transform: scale(0) rotate(-180deg); }
        100% { transform: scale(1) rotate(0deg); }
    }
    
    .why-choose-section {
        padding: 120px 0;
        background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
        position: relative;
        overflow: hidden;
    }
    
    .why-choose-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 10% 20%, rgba(255,255,255,0.1) 0%, transparent 50%),
            radial-gradient(circle at 90% 80%, rgba(255,255,255,0.1) 0%, transparent 50%);
        animation: moveGradient 10s ease-in-out infinite;
    }
    
    @keyframes moveGradient {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    .why-choose-section .section-title,
    .why-choose-section .section-description {
        color: #ffffff;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    
    .why-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(15px);
        border-radius: 25px;
        padding: 40px;
        text-align: center;
        border: 2px solid rgba(255, 255, 255, 0.25);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
    }
    
    .why-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.5s ease;
    }
    
    .why-card:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateY(-15px) scale(1.05);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        border-color: rgba(255, 255, 255, 0.4);
    }
    
    .why-card:hover::before {
        opacity: 1;
        animation: shine 1.5s ease-out;
    }
    
    @keyframes shine {
        0% { transform: translate(-50%, -50%) scale(0); }
        100% { transform: translate(-50%, -50%) scale(1); }
    }
    
    .why-icon {
        width: 90px;
        height: 90px;
        background: rgba(255, 255, 255, 0.25);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 1;
    }
    
    .why-icon::before {
        content: '';
        position: absolute;
        inset: -5px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: -1;
        filter: blur(15px);
    }
    
    .why-card:hover .why-icon {
        transform: scale(1.2) rotate(360deg);
        background: rgba(255, 255, 255, 0.35);
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.3);
    }
    
    .why-card:hover .why-icon::before {
        opacity: 1;
    }
    
    .why-icon i {
        font-size: 40px;
        color: #ffffff;
    }
    
    .why-title {
        font-size: 22px;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 18px;
    }
    
    .why-text {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.95);
        line-height: 1.8;
    }
    
    .company-info-section {
        padding: 120px 0;
        background: 
            linear-gradient(to bottom, #f0fdf4 0%, #ffffff 100%);
        position: relative;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 35px;
        margin-top: 60px;
    }
    
    .info-card {
        background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
        border-radius: 25px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 8px 30px rgba(16, 185, 129, 0.12);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        border: 2px solid rgba(16, 185, 129, 0.1);
        position: relative;
        overflow: hidden;
    }
    
    .info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.1), transparent);
        transition: left 0.5s ease;
    }
    
    .info-card:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 20px 50px rgba(16, 185, 129, 0.25);
        border-color: #10b981;
    }
    
    .info-card:hover::before {
        left: 100%;
    }
    
    .info-value {
        font-size: 48px;
        font-weight: 800;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 12px;
        animation: countUp 1.5s ease-out;
    }
    
    @keyframes countUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .info-label {
        font-size: 17px;
        color: #6b7280;
        font-weight: 600;
    }
    
    .mission-section {
        padding: 120px 0;
        background: #ffffff;
    }
    
    .mission-card {
        background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
        border-radius: 30px;
        padding: 60px;
        color: #ffffff;
        box-shadow: 0 30px 80px rgba(16, 185, 129, 0.35);
        position: relative;
        overflow: hidden;
    }
    
    .mission-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: rotateBg 20s linear infinite;
    }
    
    @keyframes rotateBg {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .mission-card > * {
        position: relative;
        z-index: 1;
    }
    
    .mission-title {
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 35px;
        color: #ffffff;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    
    .mission-list {
        list-style: none;
        padding: 0;
    }
    
    .mission-list li {
        padding: 20px 0;
        font-size: 19px;
        display: flex;
        align-items: start;
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }
    
    .mission-list li:hover {
        padding-left: 15px;
        border-bottom-color: rgba(255, 255, 255, 0.5);
    }
    
    .mission-list li:last-child {
        border-bottom: none;
    }
    
    .mission-list li::before {
        content: '→';
        margin-right: 20px;
        font-weight: bold;
        font-size: 28px;
        flex-shrink: 0;
        animation: bounce 1s ease-in-out infinite;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateX(0); }
        50% { transform: translateX(5px); }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-on-scroll {
        opacity: 0;
        animation: fadeInUp 1s ease forwards;
    }
    
    @media (max-width: 768px) {
        .intro-title { font-size: 36px; }
        .section-title { font-size: 36px; }
        .solution-card { padding: 35px; }
        .mission-card { padding: 40px; }
    }
</style>
@endpush

@section('content')
<section class="banner-section">
    <div class="container">
        <div class="banner-wrapper" data-aos="zoom-in" data-aos-duration="1200">
            <img src="{{ asset('assets/img/banner.png') }}" 
                 alt="Solvis Banner" 
                 class="img-fluid">
        </div>
    </div>
</section>

<section class="intro-section">
    <div class="container">
        <div class="intro-content" data-aos="fade-up">
            <div class="intro-icon">
                <i class="bi bi-infinity"></i>
            </div>
            <h1 class="intro-title">Solvis – Đối tác giải pháp đa lĩnh vực</h1>
            <p class="intro-text">
                Solvis tự hào là công ty dẫn đầu trong việc cung cấp các giải pháp công nghiệp và 
                kiến tạo giá trị theo chiều sâu cho khách hàng.
            </p>
            <p class="intro-text">
                Chúng tôi tập trung vào <strong>4 mảng chiến lược</strong>, qua đó đem đến sản phẩm & 
                dịch vụ chất lượng, bền vững.
            </p>
        </div>
    </div>
</section>

<section class="solutions-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="section-subtitle">Giải pháp của chúng tôi</div>
            <h2 class="section-title">4 Mảng Chiến Lược</h2>
            <p class="section-description">
                Chúng tôi cung cấp giải pháp toàn diện trong các lĩnh vực then chốt, 
                đáp ứng mọi nhu cầu của doanh nghiệp hiện đại
            </p>
        </div>

        <div class="row g-4">
            <!-- Solution 1 -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="solution-card">
                    <div class="solution-number">01</div>
                    <div class="solution-icon">
                        <i class="bi bi-droplet-fill"></i>
                    </div>
                    <h3 class="solution-title">Polymer Solution – Nhựa & Phụ gia</h3>
                    <p class="solution-description">
                        Cung cấp các loại nhựa kỹ thuật, nhựa chuyên dụng và phụ gia hiệu năng cao.
                    </p>
                    <ul class="solution-features">
                        <li>Hỗ trợ giải pháp tối ưu hóa tính chất vật liệu: độ bền, chịu nhiệt, khả năng gia công</li>
                        <li>Phục vụ nhiều ngành: nội thất, vật liệu xây dựng, linh kiện nhựa, sản xuất bản nhựa</li>
                        <li>Tích hợp với các quy trình sản xuất hiện đại: ép đùn, đổ khuôn, thổi màng</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="solution-card">
                    <div class="solution-number">02</div>
                    <div class="solution-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <h3 class="solution-title">Packaging – Mực in & Bao bì</h3>
                    <p class="solution-description">
                        Giải pháp bao bì toàn diện với chất lượng cao và thân thiện môi trường.
                    </p>
                    <ul class="solution-features">
                        <li>Cung cấp phụ gia sản xuất mực in chất lượng cao, phù hợp với bao bì thực phẩm, nhãn, màng co</li>
                        <li>Giải pháp bao bì đa dạng: màng, túi, hộp, bao bì bảo vệ</li>
                        <li>Ưu tiên các giải pháp thân thiện với môi trường, dễ tái chế</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="solution-card">
                    <div class="solution-number">03</div>
                    <div class="solution-icon">
                        <i class="bi bi-cpu"></i>
                    </div>
                    <h3 class="solution-title">Electronics – Điện tử</h3>
                    <p class="solution-description">
                        Nguyên vật liệu chuyên biệt cho ngành điện tử công nghệ cao.
                    </p>
                    <ul class="solution-features">
                        <li>Cung cấp nguyên vật liệu cho linh kiện điện tử, bảng mạch, module</li>
                        <li>Kiểm soát chất lượng chặt chẽ theo tiêu chuẩn quốc tế (ổn định, điện trở, độ dẫn, độ cách điện)</li>
                        <li>Nghiên cứu & phát triển đáp ứng yêu cầu công nghệ cao, mini hóa, tích hợp</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="solution-card">
                    <div class="solution-number">04</div>
                    <div class="solution-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <h3 class="solution-title">Construction Materials – Vật liệu xây dựng</h3>
                    <p class="solution-description">
                        Vật liệu xây dựng hiện đại, bền vững cho tương lai xanh.
                    </p>
                    <ul class="solution-features">
                        <li>Cung cấp tấm nhựa kết hợp, keo, sơn, chất phụ gia chống thấm, hỗn hợp composite</li>
                        <li>Hướng tới xây dựng xanh, vật liệu nhẹ – bền – hiệu năng cao</li>
                        <li>Ứng dụng: nội thất, ngoại thất, hệ thống cách âm, cách nhiệt, lớp phủ bảo vệ</li>
                        <li>Đáp ứng tiêu chuẩn kỹ thuật & an toàn trong xây dựng hiện đại</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-choose-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="section-subtitle" style="color: rgba(255,255,255,0.9);">Tại sao chọn chúng tôi</div>
            <h2 class="section-title">Tại sao chọn Solvis?</h2>
            <p class="section-description">
                Chúng tôi cam kết mang đến giá trị vượt trội cho mỗi khách hàng
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <h4 class="why-title">Chuyên môn sâu</h4>
                    <p class="why-text">Mỗi mảng đều có đội ngũ kỹ sư & nhà nghiên cứu chuyên biệt</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-diagram-3-fill"></i>
                    </div>
                    <h4 class="why-title">Tích hợp giải pháp</h4>
                    <p class="why-text">Khả năng phối hợp liên mảng, tối ưu từ nguyên liệu tới ứng dụng</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4 class="why-title">Chất lượng & kiểm soát</h4>
                    <p class="why-text">Quy trình nghiêm ngặt, kiểm tra đầu vào – giữa – đầu ra</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h4 class="why-title">Hỗ trợ khách hàng</h4>
                    <p class="why-text">Tư vấn kỹ thuật, căn chỉnh ứng dụng, theo dõi hiệu quả</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="company-info-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="section-subtitle">Về chúng tôi</div>
            <h2 class="section-title">Về Solvis</h2>
            <p class="section-description">
                Với hơn 30 năm kinh nghiệm, chúng tôi tự hào là đối tác tin cậy của các doanh nghiệp hàng đầu
            </p>
        </div>

        <div class="info-grid">
            <div class="info-card" data-aos="flip-left" data-aos-delay="100">
                <div class="info-value">2024</div>
                <div class="info-label">Năm thành lập</div>
            </div>

            <div class="info-card" data-aos="flip-left" data-aos-delay="200">
                <div class="info-value">30+</div>
                <div class="info-label">Năm kinh nghiệm</div>
            </div>

            <div class="info-card" data-aos="flip-left" data-aos-delay="300">
                <div class="info-value">4</div>
                <div class="info-label">Quốc gia hoạt động</div>
            </div>

            <div class="info-card" data-aos="flip-left" data-aos-delay="400">
                <div class="info-value">100%</div>
                <div class="info-label">Cam kết chất lượng</div>
            </div>
        </div>

        <div class="row mt-5" data-aos="fade-up">
            <div class="col-lg-8 mx-auto">
                <div class="info-card" style="text-align: left; padding: 45px;">
                    <h4 style="color: #10b981; margin-bottom: 25px; font-size: 26px; font-weight: 700;">
                        <i class="bi bi-geo-alt-fill"></i> Địa điểm hoạt động
                    </h4>
                    <p style="font-size: 17px; color: #4b5563; line-height: 2;">
                        <strong style="color: #065f46;">Văn phòng Hà Nội:</strong>Tầng 4, Số nhà 7 ngách 1 ngõ 26, Phố Đỗ Quang, Phường Thanh Xuân, TP Hà Nội<br>
                        {{-- <strong style="color: #065f46;">Mạng lưới:</strong> Hoạt động khắp châu Á, bao gồm Trung Quốc, Việt Nam, Hàn Quốc và Cộng hòa Séc<br> --}}
                        <strong style="color: #065f46;">Vai trò:</strong> SOLVIS đóng vai trò trung tâm chiến lược trong việc phát triển các thị trường mới nổi
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mission-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="mission-card" data-aos="fade-up">
                    <h3 class="mission-title">
                        <i class="bi bi-rocket-takeoff"></i> Sứ mệnh & Thế mạnh của chúng tôi
                    </h3>
                    <ul class="mission-list">
                        <li>Tích hợp nguồn lực thượng nguồn và hỗ trợ kỹ thuật chuyên sâu</li>
                        <li>Thực thi tại địa phương với mức độ linh hoạt cao và khả năng phản hồi nhanh</li>
                        <li>Cung cấp giải pháp chuỗi cung ứng linh hoạt và đa khu vực</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    AOS.init({
        duration: 1000,
        easing: 'ease-out-cubic',
        once: true,
        offset: 120,
        delay: 100
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate-on-scroll');
                }, index * 100);
            }
        });
    }, { 
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    document.querySelectorAll('.solution-card, .why-card, .info-card').forEach(card => {
        observer.observe(card);
    });

    window.addEventListener('scroll', () => {
        const banner = document.querySelector('.banner-wrapper');
        if (banner) {
            const scrolled = window.pageYOffset;
            const rate = scrolled * 0.3;
            banner.style.transform = `translateY(${rate}px)`;
        }
    });

    const animateValue = (element, start, end, duration) => {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            element.textContent = value + (element.dataset.suffix || '');
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    };

    const numberObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                const target = entry.target;
                const text = target.textContent;
                const match = text.match(/(\d+)/);
                if (match) {
                    const endValue = parseInt(match[0]);
                    target.dataset.suffix = text.replace(match[0], '');
                    target.classList.add('animated');
                    animateValue(target, 0, endValue, 2000);
                }
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.info-value').forEach(el => {
        numberObserver.observe(el);
    });

    document.querySelectorAll('.solution-card, .why-card, .info-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)';
        });
    });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    
</script>
@endpush