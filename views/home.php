<section id="home" class="hero">
    <div class="hero-overlay"></div>
    <div class="container hero-container">
        <div class="hero-text">
            <span class="hero-badge">Sejak 2015</span>
            <h1 class="hero-title">Kenangan Manis<br><span class="hero-sub">Bakery &amp; Kafe</span></h1>
            <p class="hero-description">Roti dan kue artisan dari bahan-bahan terbaik. Setiap gigitan adalah kenangan yang manis.</p>
            <div class="hero-buttons">
                <a href="#menu" class="btn btn-primary">Lihat Menu <i class="fas fa-arrow-right"></i></a>
                <a href="#reserve" class="btn btn-outline">Pesan Meja <i class="fas fa-calendar-alt"></i></a>
            </div>
            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Varian Roti &amp; Kue</span>
                </div>
                <div class="stat">
                    <span class="stat-number">2000+</span>
                    <span class="stat-label">Pelanggan Puas</span>
                </div>
                <div class="stat">
                    <span class="stat-number">4.9</span>
                    <span class="stat-label">Rating Google</span>
                </div>
            </div>
        </div>
        <div class="hero-image">
            <img src="assets/images/hero-bakery.jpeg" 
                 alt="Kenangan Manis Bakery"
                 onerror="this.src='https://placehold.co/600x500/FFF5E6/8B5E3C?text=Kenangan+Manis'">
        </div>
    </div>
</section>
<section id="menu" class="menu-section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Nikmati Kelezatan</span>
            <h2 class="section-title">Menu <span class="highlight">Spesial Kami</span></h2>
            <p class="section-description">Dibuat dengan penuh cinta dari bahan-bahan alami pilihan</p>
        </div>
        
        <div class="menu-grid">
            <?php foreach ($menuItems as $item): ?>
            <div class="menu-card">
                <div class="menu-image">
                    <img src="assets/images/<?php echo htmlspecialchars($item['image']); ?>" 
                         alt="<?php echo htmlspecialchars($item['name']); ?>"
                         onerror="this.src='https://placehold.co/400x300/FFF5E6/8B5E3C?text=Kenangan+Manis'">
                    <span class="menu-category"><?php echo htmlspecialchars($item['category']); ?></span>
                </div>
                <div class="menu-info">
                    <h3 class="menu-name"><?php echo htmlspecialchars($item['name']); ?></h3>
                    <p class="menu-description"><?php echo htmlspecialchars($item['description']); ?></p>
                    <div class="menu-footer">
                        <span class="menu-price">Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></span>
                        <a href="#reserve" class="menu-order">Pesan <i class="fas fa-shopping-bag"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="about-section">
    <div class="container about-container">
        <div class="about-image">
            <img src="assets/images/bakery-interior.jpeg" alt="Suasana Kenangan Manis"
                 onerror="this.src='https://placehold.co/600x500/FFF5E6/8B5E3C?text=Kenyamanan+Bakery'">
        </div>
        <div class="about-content">
            <span class="section-tag">Cerita Kami</span>
            <h2 class="section-title">Setiap Gigitan Adalah <span class="highlight">Kenangan</span></h2>
            <p>Kenangan Manis lahir dari kecintaan terhadap roti dan kue tradisional yang dibuat dengan resep turun-temurun. Kami menggunakan bahan-bahan lokal terbaik tanpa pengawet buatan.</p>
            <div class="about-features">
                <div class="feature">
                    <i class="fas fa-leaf"></i>
                    <span>Bahan Organik</span>
                </div>
                <div class="feature">
                    <i class="fas fa-heart"></i>
                    <span>Tanpa Pengawet</span>
                </div>
                <div class="feature">
                    <i class="fas fa-mug-hot"></i>
                    <span>Kopi Spesial</span>
                </div>
            </div>
            <a href="#reserve" class="btn btn-secondary">Kunjungi Kami</a>
        </div>
    </div>
</section>
<section id="reserve" class="reservation-section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Pesan Sekarang</span>
            <h2 class="section-title">Buat <span class="highlight">Reservasi</span></h2>
            <p class="section-description">Isi form berikut untuk memastikan tempat terbaik di Kenangan Manis</p>
        </div>
        
        <div class="reservation-grid">
            <div class="reservation-form-box">
                <h3><i class="fas fa-calendar-check"></i> Form Reservasi</h3>
                <?php if ($flashMessage): ?>
                    <div class="alert alert-<?php echo $flashType === 'success' ? 'success' : 'error'; ?>">
                        <?php echo $flashMessage; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="" class="reserve-form">
                    <input type="hidden" name="action" value="reserve">
                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> Nama Lengkap</label>
                        <input type="text" id="name" name="name" required placeholder="Nama Anda">
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" id="email" name="email" required placeholder="email@contoh.com">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="date"><i class="fas fa-calendar"></i> Tanggal</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time"><i class="fas fa-clock"></i> Waktu</label>
                            <input type="time" id="time" name="time" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="guests"><i class="fas fa-users"></i> Jumlah Tamu</label>
                        <input type="number" id="guests" name="guests" min="1" max="50" required placeholder="Jumlah orang">
                    </div>
                    <div class="form-group">
                        <label for="special_request"><i class="fas fa-comment"></i> Permintaan Khusus</label>
                        <textarea id="special_request" name="special_request" rows="3" placeholder="Alergi, diet khusus, atau permintaan lainnya..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-paper-plane"></i> Kirim Reservasi
                    </button>
                </form>
            </div>
            <div id="inbox" class="reservation-inbox">
                <h3><i class="fas fa-inbox"></i> Reservation Inbox</h3>
                <p class="inbox-subtitle">Permintaan reservasi terbaru yang masuk</p>
                
                <?php if (empty($reservations)): ?>
                    <div class="empty-inbox">
                        <i class="fas fa-envelope-open-text"></i>
                        <p>Belum ada reservasi masuk. Jadilah yang pertama!</p>
                    </div>
                <?php else: ?>
                    <div class="inbox-list">
                        <?php foreach (array_slice($reservations, 0, 10) as $res): ?>
                        <div class="inbox-item">
                            <div class="inbox-header">
                                <strong class="inbox-name"><?php echo htmlspecialchars($res['name']); ?></strong>
                                <span class="inbox-date"><?php echo date('d/m/Y', strtotime($res['date'])); ?> • <?php echo $res['time']; ?></span>
                            </div>
                            <div class="inbox-details">
                                <span><i class="fas fa-users"></i> <?php echo $res['guests']; ?> tamu</span>
                                <span><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($res['email']); ?></span>
                            </div>
                            <?php if (!empty($res['special_request'])): ?>
                                <div class="inbox-request">
                                    <i class="fas fa-comment-dots"></i> <?php echo nl2br(htmlspecialchars(substr($res['special_request'], 0, 100))); ?>
                                </div>
                            <?php endif; ?>
                            <div class="inbox-footer">
                                <span class="inbox-status status-pending"><?php echo $res['status'] === 'pending' ? 'Menunggu konfirmasi' : 'Dikonfirmasi'; ?></span>
                                <span class="inbox-time"><i class="fas fa-clock"></i> <?php echo date('H:i', strtotime($res['created_at'])); ?></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if (count($reservations) > 10): ?>
                        <div class="inbox-more">
                            <span>+ <?php echo count($reservations) - 10; ?> reservasi lainnya</span>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="testimonials">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Testimoni</span>
            <h2 class="section-title">Apa Kata <span class="highlight">Pelanggan</span></h2>
        </div>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <i class="fas fa-quote-left"></i>
                <p>"Roti coklat lumer nya enak banget! Tempatnya juga cozy buat nongkrong atau kerja."</p>
                <div class="testimonial-author">
                    <strong>Kumar</strong>
                    <span>Food Blogger</span>
                </div>
            </div>
            <div class="testimonial-card">
                <i class="fas fa-quote-left"></i>
                <p>"Kue red velvet-nya lembut dan gak terlalu manis. Pelayanan ramah, pasti balik lagi!"</p>
                <div class="testimonial-author">
                    <strong>Cukurukuk</strong>
                    <span>Professor</span>
                </div>
            </div>
            <div class="testimonial-card">
                <i class="fas fa-quote-left"></i>
                <p>"Best bakery di kota Bondowoso! Croissant kejunya juara, kopinya juga spesial. Recommended!"</p>
                <div class="testimonial-author">
                    <strong>Acumalaka</strong>
                    <span>Waiter</span>
                </div>
            </div>
        </div>
    </div>
</section>