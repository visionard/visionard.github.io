using System;
using Microsoft.Azure.Management.Compute.Fluent;
using Microsoft.Azure.Management.Compute.Fluent.Models;
using Microsoft.Azure.Management.Fluent;
using Microsoft.Azure.Management.ResourceManager.Fluent;
using Microsoft.Azure.Management.ResourceManager.Fluent.Core;
using Microsoft.WindowsAzure.Storage;
using Microsoft.WindowsAzure.Storage.Blob;

namespace ConsoleApp1
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Creating Virtual Machine");
            var credentials = SdkContext.AzureCredentialsFactory
                .FromFile("local_path_location"); // azureauth.properties file location
            var azure = Azure
                .Configure()
                .WithLogLevel(HttpLoggingDelegatingHandler.Level.Basic)
                .Authenticate(credentials)
                .WithDefaultSubscription();
            var groupName = "myResourceGroup";
            var templatePath = "location"; // MyVM.json file location which should be like http://validurl.com/path/to/MyVM.json
            var paramPath = "location"; // Parameters.json file lcoation which should be like https://validurl.com/path/to/Paramters.json
            var deployment = azure.Deployments.Define("deploymentName")
                .WithExistingResourceGroup(groupName)
                .WithTemplateLink(templatePath, "1.0.0.0")
                .WithParametersLink(paramPath, "1.0.0.0")
                .WithMode(Microsoft.Azure.Management.ResourceManager.Fluent.Models.DeploymentMode.Incremental)
                .Create();
            Console.WriteLine("Virtual Machine Successfully created");
            Console.ReadLine();
        }
    }
}
