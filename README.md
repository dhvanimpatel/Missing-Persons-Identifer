# Missing-Persons-Identifer

## About
This project leverages AWS services to create a missing persons website in which a user can input an image and receive an email indentifying if that image was matched to an individual in the NamUS database. 

## AWS Services
(the definitions are provided from the AWS website)
AWS S3 Bucket - public cloud storage resource available in Amazon Web Services' (AWS) Simple Storage Service (S3), an object storage offering. Amazon S3 buckets, which are similar to file folders, store objects, which consist of data and its descriptive metadata. Images were scraped from the NamUs database and stored into an s3 bucket.

AWS Lambda - an event-driven, serverless computing platform provided by Amazon as a part of Amazon Web Services. It is a computing service that runs code in response to events and automatically manages the computing resources required by that code. The functions created on lambda include create_coll.py, add_faces_to_coll.py, and search_faces_msg.py

AWS Rekognition Image - an image recognition service that detects objects, scenes, faces, etc. After a collection was created, Rekognition was used to index and store all faces from the missing persons s3 bucket into the created collection to be used for future purposes. The service was again used in the search_faces_msg.py file to match an input image to the faces in the collection and product a result.

AWS SES - an email service where you can send transactional email, marketing messages, or any other types of content to customers. SES was used to send an email based on the image match results to the php site user.

## Website
The website was created using php and html
