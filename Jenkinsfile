pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main',
            credentialsId: '0ff32528-117d-4d50-8a9c-e4b1ab0f1be4',
            url: 'https://github.com/Joseph-KJ/jenkinsstudy.git'
            }
        }
        

        stage('Deploy') {
            steps {
                sshagent(['0ff32528-117d-4d50-8a9c-e4b1ab0f1be4']) {
                    sh '''
                    ssh ubuntu@3.111.36.100 << EOF
                    cd /home/ubuntu/app
                    git pull origin main
                    docker-compose down
                    docker-compose up -d --build
                    EOF
                    '''
                }
            }
        }
    }
}
