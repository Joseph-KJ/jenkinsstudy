pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/your-repo/employee-management.git'
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
                sshagent(['jenkins-ssh-key']) {
                    sh '''
                    ssh -o StrictHostKeyChecking=no ubuntu@<EC2_INSTANCE_1> "cd /home/ubuntu/employee-management && docker-compose pull && docker-compose up -d"
                    '''
                }
            }
        }
    }
}
