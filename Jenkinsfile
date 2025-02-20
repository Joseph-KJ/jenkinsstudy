pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/Joseph-KJ/jenkinsstudy.git'
            }
        }
        
        stage('Build & Push Docker Images') {
            steps {
                sh '''
                docker-compose down
                docker-compose build
                docker-compose up -d
                '''
            }
        }
        
        stage('Deploy') {
            steps {
                sshagent(['0ff32528-117d-4d50-8a9c-e4b1ab0f1be4']) {
                    sh '''
                    ssh -o StrictHostKeyChecking=no ubuntu@<EC2_INSTANCE_1> "cd /home/ubuntu/employee-management && docker-compose pull && docker-compose up -d"
                    '''
                }
            }
        }
    }
}
