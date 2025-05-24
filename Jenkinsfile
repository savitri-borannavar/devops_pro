pipeline {
    environment {
        DOCKER_IMAGE = 'savitrinb/serve_smart'
        EC2_HOST = 'ubuntu@3.83.140.51'  // Replace with your actual IP
    }

    agent any

    stages {
        stage('Clone Repository') {
            steps {
                git credentialsId: '88f671b4-90a3-4083-bba4-37e02f273e33', url: 'https://github.com/savitri-borannavar/devops_pro.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh "docker build -t $DOCKER_IMAGE ."
            }
        }

        stage('Push to Docker Hub') {
            steps {
                withCredentials([usernamePassword(credentialsId: '007643c0-9a20-4874-9b09-2a0926ff1d75', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    sh """
                        echo $DOCKER_PASS | docker login -u $DOCKER_USER --password-stdin
                        docker push $DOCKER_IMAGE:latest
                    """
                }
            }
        }

        stage('Deploy to EC2') {
            steps {
                sshagent(['ec2_ssh_key']) {
                    sh """
                        ssh -o StrictHostKeyChecking=no $EC2_HOST << 'ENDSSH'
                            docker pull $DOCKER_IMAGE:latest
                            docker stop serve_smart || true
                            docker rm serve_smart || true
                            docker run -d -p 80:80 --name serve_smart $DOCKER_IMAGE:latest
                        ENDSSH
                    """
                }
            }
        }

        stage('Cleanup') {
            steps {
                sh "docker rmi $DOCKER_IMAGE"
            }
        }
    }

    post {
        success {
            echo '✅ CI/CD pipeline complete. App deployed on EC2.'
        }
        failure {
            echo '❌ Pipeline failed.'
        }
    }
}
