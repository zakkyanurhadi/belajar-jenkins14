pipeline {
    agent any 

    stages {
        stage('Checkout Code') {
            steps {
                // Mengambil kode dari repo spesifik Anda
                // Pastikan branch-nya benar ('main' atau 'master')
                git branch: 'main', url: 'https://github.com/zakkyanurhadi/belajar-jenkins14.git'
            }
        }
        
        stage('Install Dependencies') {
            steps {
                // Install library CI4 yang dibutuhkan
                script {
                    powershell 'composer install --no-interaction --prefer-dist'
                }
            }
        }

        stage('Verify System') {
            steps {
                script {
                    // Cek versi PHP dan pastikan spark bisa jalan
                    powershell 'php -v'
                    powershell 'php spark routes'
                }
            }
        }

        stage('Unit Tests') {
            steps {
                script {
                    // Buat folder untuk menampung hasil test
                    powershell 'New-Item -ItemType Directory -Force -Path target'
                    
                    // Jalankan test. Jika gagal, pipeline akan merah (gagal)
                    powershell 'vendor/bin/phpunit --log-junit target/logfile.xml'
                }
            }
        }
    }

    post {
        always {
            // Ambil laporan test XML agar muncul grafik di Jenkins
            junit 'target/*.xml'
        }
    }
}